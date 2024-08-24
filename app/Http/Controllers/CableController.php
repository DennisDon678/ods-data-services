<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CableController extends Controller
{
    //
    public function validate_subscriber(Request $request)
    {

        $response = Http::get(env('API_URI') . '/ajax/validate_iuc?smart_card_number', [
            'smart_card_number' => $request->iuc,
            'cablename' => $request->cablename
        ])->json();

        if ($response['invalid']) {
            return response()->json(1);
        } else {
            return response()->json($response);
        }
    }

    public function buy_cable_subscription(Request $request)
    {
        $user = User::find($request->user()->id);
        if ($user->balance >= $request->amount) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('API_BASE_URL') . 'cablesub/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{"cablename":' . $request->cablename . ',
                    "cableplan": "' . $request->plan . '",
                    "smart_card_number": ' . $request->iuc . '
                    }',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Token ' . env('API_TOKEN'),
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $response = json_decode($response, true);

            curl_close($curl);
            if (array_key_exists('error', $response)) {
                return response()->json(2);
            } else {
                if ($response['Status']) {
                    $user->balance = $user->balance - $request->amount;
                    $user->save();

                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => 'Cable Purchase',
                        'type' => "cable",
                        'amount' => $request->amount,
                        'status' => $response['Status'],
                        'number' => $response['smart_card_number'],
                        'size' => $response['package'],
                    ]);
                    return response()->json(0);
                } else {
                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => 'Cable Purchase',
                        'type' => "cable",
                        'amount' => $request->amount,
                        'status' => $response['Status'],
                        'number' => $response['smart_card_number'],
                        'size' => $response['package'],
                    ]);

                    return response()->json(3);
                }
            }
        } else {
            return response()->json(1);
        }
    }
}
