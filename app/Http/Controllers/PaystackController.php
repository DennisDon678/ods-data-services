<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaystackController extends Controller
{
    public function init(Request $request){
        $response = Http::withHeaders([
            "Authorization" => "Bearer ".env('PAYSTACK_SECRET_KEY'),
            "Cache-Control" => 'no-cache',
        ])->post('https://api.paystack.co/transaction/initialize', [
            'amount' => $request->amount * 100, // amount in cents
            'email' => Auth::user()->email,
        ]);

        return response()->json([
            'access_code' => $response->json()['data']['access_code']
        ]);
    }

    public function create_transaction(Request $request){
        $trans = Transactions::create([
            'user_id' => Auth::user()->id,
            'transaction_id' => $request->reference,
            'title' => "Wallet Funding",
            'type' => "deposit",
            'amount' => $request->amount,
            'status' => strtolower('pending'),
        ]);

        return response()->json([
            'trans' => $trans,
        ]);
    }

    public function update_transaction(Request $request){
        $trans = Transactions::where('transaction_id', $request->reference)->first();
        if($request->status == strtoupper('success')){
            if($trans->status == "pending"){
                Log::info('Transaction processed via Callback');
                $user = User::find($trans->user_id);
                $user->balance += $trans->amount;
                $user->save();

                $trans->status = strtolower('successful');
                $trans->save();
            }
        }else{
            $trans->status = strtolower($request->status);
            $trans->save();
        }

        return response()->json([
            'trans' => $trans,
        ]);
    }
    
    public function webhookAction(Request $request){
        // if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER))
        //     exit();

        // // Retrieve the request's body
        $input = @file_get_contents("php://input");


        // // validate event do all at once to avoid timing attack
        // if ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, env('PAYSTACK_SECRET_KEY')))
        // exit();

        http_response_code(200);

        // parse event (which is json string) as object
        // Do something - that will not take long - with $event
        $event = json_decode($input);

        // obtain data from event
        $data = $event->data;
        sleep(20);
        // Get transaction
        $transaction = Transactions::where('transaction_id', $data->reference)->first();

        if ($transaction && $transaction->status == 'pending'){
            if($data->status == 'success'){
                $user = User::find($transaction->user_id);
                $user->balance += $transaction->amount;
                $user->save();

                // update transaction status to successful
                $transaction->status = strtolower('successful');
                $transaction->save();
            }
        }else{
            // update transaction status to successful
            $transaction->status = strtolower($data->status);
            $transaction->save();
        }
    }
}
