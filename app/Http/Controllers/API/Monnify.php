<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Reserved_bank;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Monnify extends Controller
{
    private $auth_token;
    private $contract_code;
    private $api_key;
    private $secret_key;
    private $base_url;

    public function __construct()
    {
        $this->contract_code = env('MONIFY_CONTRACT');
        $this->api_key = env('MONIFY_KEY');
        $this->secret_key = env('MONIFY_SECRET_KEY');
        $this->base_url = env('MONIFY_URL');

        // get $auth_token;
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('MONIFY_KEY') . ':' . env('MONIFY_SECRET_KEY')),
            "Content-Type" => "application/json"
        ])->post($this->base_url . '/api/v1/auth/login');

        $this->auth_token = $response->json()['responseBody']['accessToken'];
    }

    public function initiate_deposit(Request $request)
    {
        // validate request for amount
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        $reference = uniqid();

        $amount = $request->amount;
        $transaction = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->auth_token,
            'Content-Type' => 'application/json',
        ])->post($this->base_url . '/api/v1/merchant/transactions/init-transaction', [
            'amount' => $amount,
            'customerName' => $request->user()->name,
            'customerEmail' => $request->user()->email,
            'paymentReference' => $reference,
            'paymentDescription' => 'Wallet Funding',
            'currencyCode' => 'NGN',
            'contractCode' => $this->contract_code,
            'redirectUrl' => 'https://yourwebsite.com/monnify/redirect',
            'paymentMethods' => ['CARD', 'ACCOUNT_TRANSFER']
        ]);


        $details = $transaction->json()['responseBody'];

        $trans = Transactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $request->reference,
            'title' => "Wallet Funding",
            'type' => "deposit",
            'amount' => $request->amount,
            'status' => strtolower($request->status),
        ]);

        return response()->json([
            'status' => 'success',
            'reference' => $details['transactionReference'],
        ]);
    }

    public function create_bank_account($transaction_reference)
    {
        // Validate
        if (!$transaction_reference) {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaction reference is required'
            ], 400);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->auth_token,
            'Content-Type' => 'application/json',
        ])->post($this->base_url . '/api/v1/merchant/bank-transfer/init-payment', [
            'transactionReference' => $transaction_reference
        ]);

        $details = $response->json()['responseBody'];

        return response()->json([
            'status' => 'success',
            'data' => [
                'account_name' => $details['accountName'],
                'account_number' => $details['accountNumber'],
                'bank_name' => $details['bankName'],
                'duration_seconds' => $details['accountDurationSeconds'],
                'amount' => $details['totalPayable'],
            ]
        ]);
    }

    public function verify_payment(Request $request)
    {
        // Validate
        $request->validate([
            'transaction_reference' => 'required|string'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->auth_token,
            'Content-Type' => 'application/json',
        ])->get($this->base_url . '/api/v2/transactions/' . $request->transaction_reference);

        $details = $response->json()['responseBody'];
        $status = $details['paymentStatus'];



        return response()->json([
            'payment_status' => $status,
        ]);
    }

    public function dedicated_account(Request $request)
    {
        // Validate
        $request->validate([
            'bvn' => 'required|string'
        ]);

        $account = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->auth_token,
        ])->post(env('MONIFY_URL') . '/api/v2/bank-transfer/reserved-accounts', [
            "accountReference" => $request->user()->id,
            "accountName" => $request->user()->name,
            "currencyCode" => "NGN",
            "contractCode" => env('MONIFY_CONTRACT'),
            "customerEmail" => $request->user()->email,
            "customerName" => $request->user()->name,
            "getAllAvailableBanks" => false,
            'bvn' => $request->bvn,
            "preferredBanks" => ['232'],
        ])->json();

        // Save to database
        Log::info($account);
        if ($account['requestSuccessful'] == true) {
            $create = Reserved_bank::create([
                'user_id' => $request->user()->id,
                'account_number' => $account['responseBody']['accounts'][0]['accountNumber'],
                'account_name' => $account['responseBody']['accountName'],
                'bank_name' => $account['responseBody']['accounts'][0]['bankName'],
            ]);
            if ($create) {
                // Create notification
                $notification = Notification::create([
                    'user_id' => $request->user()->id,
                    'title' => 'Bank Account Created',
                    'description' => 'Your bank account has been successfully created.',
                    'status' => 0
                ]);
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Bank account created successfully',
                        'data' => $account['responseBody']['accounts'][0]
                    ]
                );
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred while creating bank account'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $account['responseMessage']
            ]);
        }
    }

    public function get_dedicated_account(Request $request)
    {
        $account = Reserved_bank::where('user_id', $request->user()->id)->first();
        if ($account) {
            return response()->json([
                'status' => 'success',
                'data' => $account
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No bank account found'
            ]);
        }
    }
}
