<?php

namespace App\Http\Controllers;

use App\Models\Automatic_funding_config;
use App\Models\Notification;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AppController extends Controller
{
    public function monify_webhook(Request $request)
    {

        $payload = json_encode($request->all());
        $info = json_decode($payload);
        $type = $info->eventType;
        $info = $info->eventData;

        Storage::put('webhook.txt', $payload);

        $product = $info->product;
        // Handle reserved Accounts
        if ($info->product->type == "RESERVED_ACCOUNT") {
            // for transactions qith same id in database
            $transaction = Transactions::where('transaction_id', '=', $info->transactionReference)->first();
            if ($transaction) {
                return response()->json([
                    'transaction' => $transaction
                ]);
            } else {
                // Create a new transaction
                if ($type == 'SUCCESSFUL_TRANSACTION') {
                    $auto_config = Automatic_funding_config::first();
                    $user = User::find($info->product->reference);
                    $user->balance = $user->balance + ($info->amountPaid - $auto_config->charge_amount);
                    $user->save();
                    Transactions::create([
                        'user_id' => $info->product->reference,
                        'transaction_id' => $info->transactionReference,
                        'amount' => ($info->amountPaid - $auto_config->charge_amount),
                        'status' => 'successful',
                        'title' => "Wallet Funding",
                        'type' => "deposit",
                    ]);

                    Notification::create([
                        'user_id' => $user->id,
                        'title' => "Automated Wallet Funding",
                        'description' => "We have received your deposit of NGN " . number_format($info->settlementAmount, 2),
                        'status' => 0
                    ]);
                }
            }
        } else {
            // get the paymentReference
            $ref = $info->paymentReference;
            $trans = Transactions::where('transaction_id', '=', $ref)->first();

            if ($info->paymentStatus == 'PAID') {
                // find the paymentReference
                $paidAmount = $info->amountPaid;
                $charge = ($trans->amount * 1.65) / (100);

                $dbamount = $paidAmount - round($charge);
                Log::info($dbamount);

                if ($dbamount == $trans->amount) {
                    if ($trans && $trans->status == "pending") {
                        Log::info('Transaction processed via Callback');
                        $user = User::find($trans->user_id);
                        $user->balance += $trans->amount;
                        $user->save();

                        $trans->status = strtolower('successful');
                        $trans->save();
                    }
                } else {
                    $trans->status = strtolower('failed');
                    $trans->save();
                }
            } else {
                $trans->status = strtolower('failed');
                $trans->save();
            }
        }

        http_response_code(200);
    }
}
