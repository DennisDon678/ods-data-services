<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
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
        if($info->product->type == "RESERVED_ACCOUNT"){
            // for transactions qith same id in database
            $transaction = Transactions::where('transaction_id','=', $info->transactionReference)->first();
            if($transaction){
                return response()->json([
                    'transaction' => $transaction
                ]);
            }else{
                // Create a new transaction
                if($type == 'SUCCESSFUL_TRANSACTION'){
                    $user = User::find($info->product->reference);
                    $user->balance = $user->balance + $info->settlementAmount;
                    $user->save();
                    Transactions::create([
                        'user_id' => $info->product->reference,
                        'transaction_id' => $info->transactionReference,
                        'amount' => $info->settlementAmount,
                        'status' => 'success',
                        'title' => "Wallet Funding",
                        'type' => "deposit",
                    ]);

                    Notification::create([
                        'user_id' => $user->id,
                        'title' => "Automated Wallet Funding",
                        'description' => "We have received your deposit of NGN ".number_format($info->settlementAmount,2),
                        'status' => 0
                    ]);
                }
            }
        }

        http_response_code(200);
    }
}
