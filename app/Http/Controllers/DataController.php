<?php

namespace App\Http\Controllers;

use App\Mail\DirectMail;
use App\Models\Admin;
use App\Models\Airtime_discount;
use App\Models\Dataplans;
use App\Models\Network_list;
use App\Models\plan_type_list;
use App\Models\Preorder;
use App\Models\Preordered;
use App\Models\Profits;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vendor_config;
use App\Models\Vendors_preorder_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class DataController extends Controller
{
    //

    public function get_plan_types(Request $request)
    {
        if (isset($request->network_id)) {
            $plan_types = plan_type_list::where('network_id', '=', $request->network_id)->where('status', '=', 'active')->get();
            return response()->json($plan_types);
        } else {
            return response()->json('Invalid network request');
        }
    }

    public function get_data_plans(Request $request)
    {
        if (isset($request->plan_id)) {
            $plan_types = Dataplans::where('plan_id', '=', $request->plan_id)->get();
            return response()->json($plan_types);
        } else {
            return response()->json('Invalid network request');
        }
    }

    public function get_plan(Request $request)
    {
        if (isset($request->data_id)) {
            $data = Dataplans::where('data_id', '=', $request->data_id)->first();
            $profit = Profits::where('plan_type', '=', $data->plan_id)->first();
            // $string = $data->size;

            // // check the size
            // if (str_contains(strtoupper($data->size), 'GB')) {
            //     $numbers = '';
            //     for ($i = 0; $i < strlen($string); $i++) {
            //         if (is_numeric($string[$i])) {
            //             $numbers .= $string[$i];
            //         }
            //     }
            //     $profit = $profit->profit * $numbers / 10;
            // } else {
            //     $numbers = '';
            //     for ($i = 0; $i < strlen($string); $i++) {
            //         if (is_numeric($string[$i])) {
            //             $numbers .= $string[$i];
            //         }
            //     }
            //     $profit = $profit->profit * ($numbers / 10 / 1000);
            // }
            $profit =  ($profit->profit / 100) * $data->price;
            if (Auth::user()->is_vendor) {
                $vendor_config = Vendor_config::first();

                $price = ($data->price + $profit) - (($data->price + $profit) * ($vendor_config->discount / 100));
            } else {
                $price = $data->price + $profit;
            }

            return response()->json((int)$price);
        }
    }

    public function buy_data(Request $request)
    {
        // return response()->json($request->all());
        // Check Users Balance
        $user = User::find($request->user()->id);
        $plan = Dataplans::where('data_id', $request->plan_id)->first();
        $profit = Profits::where('plan_type', '=', $plan->plan_id)->first();
        // $amount = abs($request->amount);
        $profit =  ($profit->profit / 100) * $plan->price;
        if (Auth::user()->is_vendor) {
            $vendor_config = Vendor_config::first();

            $price = ($plan->price + $profit) - (($plan->price + $profit) * ($vendor_config->discount / 100));
        } else {
            $price = $plan->price + $profit;
        }
        $amount = (int)$price;


        if ($user->balance >= $amount) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('API_BASE_URL') . 'data/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{"network":' . $request->network_id . ',
                    "mobile_number": "' . $request->mobile_number . '",
                    "plan": ' . $request->plan_id . ',
                    "Ported_number":true
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

                if ($response['Status'] == 'successful') {
                    // debit User's account
                    $user->balance = $user->balance - $amount;
                    $user->save();
                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => $response['plan_name'] . 'to' . $response['mobile_number'],
                        'type' => "data",
                        'amount' => $amount,
                        'status' => $response['Status'],
                        'number' => $response['mobile_number'],
                        'size' => $response['plan_name'],
                    ]);

                    return response()->json(0);
                } else {
                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => 'Data Purchase',
                        'type' => "data",
                        'amount' => $amount,
                        'status' => $response['Status'],
                        'number' => $response['mobile_number'],
                        'size' => $response['plan_name'],
                    ]);

                    return response()->json(3);
                }
            }
        } else {
            return response()->json(1);
        }
    }

    public function get_preorders(Request $request)
    {
        $plans = Preorder::where('network_id', '=', $request->network_id)->get();

        if ($plans) {
            return response()->json($plans);
        } else {
            return response()->json(1);
        }
    }


    public function get_preorders_details(Request $request)
    {
        $plan = Preorder::find($request->data_id);

        if ($plan) {
            if (Auth::user()->is_vendor) {
                $vendor_config = Vendors_preorder_config::first();
                $int_var = preg_replace('/[^0-9]/', '', $plan->size);

                $price = $plan->price - ($vendor_config->discount_amount * $int_var);
            } else {
                $price = $plan->price;
            }
            return response()->json($price);
        } else {
            return response()->json(1);
        }
    }

    public function submit_preorders(Request $request)
    {
        $plan = Preorder::find($request->data_id);

        if (Auth::user()->is_vendor) {
            $vendor_config = Vendors_preorder_config::first();

            $int_var = preg_replace('/[^0-9]/', '', $plan->size);

            $price = $plan->price - ($vendor_config->discount_amount * $int_var);
        } else {
            $price = $plan->price;
        }
        // Charge the User Account
        $user = User::find($request->user()->id);
        // check if user has enough balance
        if ($user->balance >= $price) {
            $user->balance -= $price;
            $user->save();

            // Created Preordered 
            $reference = uniqid();
            $order = Preordered::create([
                'reference' => $reference,
                'user_id' => Auth::user()->id,
                'network' => 'MTN',
                'size' => $plan->size,
                'number' => $request->number,
                'status' => 'processing',
                'amount' => $price,
            ]);

            if ($order) {
                // Create Transaction
                $transaction = Transactions::create([
                    'user_id' => $request->user()->id,
                    'transaction_id' => $reference,
                    'title' =>  $plan->size . ' Pre-Order to ' . $request->number,
                    'type' => "preorder",
                    'amount' => $price,
                    'status' => 'processing',
                    'size' => $plan->size,
                    'number' => $request->number,
                ]);

                // notify admin 
                try {
                    $info = "You Have a pending PreOrder";
                    Mail::to(Admin::first()->email, 'admin')->send(new DirectMail($info, 'admin'));
                } catch (\Exception $e) {
                }

                return response()->json(0);
            } else {
                return response()->json(2);
            }
        } else {
            return response()->json(1);
        }
    }

    public function buy_airtime(Request $request)
    {
        // Check Users Balance
        $user = User::find($request->user()->id);
        $discountConfig = Airtime_discount::first();
        $airtime = $request->amount;
        // $reference = uniqid();
        if ($user->balance >= $airtime) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => env('API_BASE_URL') . 'topup/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{"network":' . $request->network . ',
                "amount":' . $request->amount . ',
                "mobile_number":"' . $request->phone . '",
                "Ported_number":true,
                "airtime_type":"VTU"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Token ' . env('API_TOKEN'),
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            // $response = json_encode([
            //     'Status' => 'successful',
            //     'ident' => uniqid(),
            //     'network' => $request->network,
            //     'amount' => $request->amount,
            //     'mobile_number' => $request->phone,
            //     'Ported_number' => true,
            //     'airtime_type' => 'VTU',
            // ]);
            $response = json_decode($response, true);

            curl_close($curl);
            if (array_key_exists('error', $response)) {
                return response()->json($response);
            } else {
                if ($response['Status'] == 'successful') {
                    // get network discount
                    $discount = null;
                    $network = Network_list::where('network_id', '=', $request->network)->first();
                    
                    if ($network->label == 'MTN') {
                        $discount = $discountConfig->mtn;
                    } elseif ($network->label == 'GLO') {
                        $discount = $discountConfig->glo;
                    } elseif ($network->label == 'AIRTEL') {
                        $discount = $discountConfig->airtel;
                    } elseif ($network->label == '9MOBILE') {
                        $discount = $discountConfig->mobile;
                    }
                    $discountAmount = ($discount / 100) * $request->amount;
                    // debit User's account
                    $user->balance = $user->balance - $request->amount + $discountAmount;
                    $user->save();
                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => 'Airtime Purchase',
                        'type' => "airtime",
                        'amount' => $request->amount,
                        'status' => $response['Status'],
                        'number' => $response['mobile_number'],
                    ]);

                    return response()->json(0);
                } else {
                    // create transaction
                    Transactions::create([
                        'user_id' => $request->user()->id,
                        'transaction_id' => $response['ident'],
                        'title' => 'Airtime Purchase',
                        'type' => "airtime",
                        'amount' => $request->amount,
                        'status' => $response['Status'],
                        'number' => $response['mobile_number'],
                    ]);

                    return response()->json(3);
                }
            }
        } else {
            return response()->json(1);
        }
    }
}
