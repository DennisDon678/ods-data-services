<?php

namespace App\Http\Controllers;

use App\Models\Dataplans;
use App\Models\plan_type_list;
use App\Models\Preorder;
use App\Models\Preordered;
use App\Models\Profits;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            $string = $data->size;

            // check the size
            if (str_contains(strtoupper($data->size), 'GB')) {
                $numbers = '';
                for ($i = 0; $i < strlen($string); $i++) {
                    if (is_numeric($string[$i])) {
                        $numbers .= $string[$i];
                    }
                }
                $profit = $profit->profit * $numbers / 10;
            } else {
                $numbers = '';
                for ($i = 0; $i < strlen($string); $i++) {
                    if (is_numeric($string[$i])) {
                        $numbers .= $string[$i];
                    }
                }
                $profit = $profit->profit * ($numbers / 10 / 1000);
            }
            $price = $data->price + $profit;
            return response()->json($price);
        }
    }

    public function buy_data(Request $request)
    {
        // Check Users Balance
        $user = User::find($request->user()->id);
        $plan = Dataplans::find($request->plan_id);
        $profit = Profits::where('plan_type', '=', $plan->plan_id)->first();

        if ($user->balance >= ($plan->price + $profit->profit)) {
            return response()->json(0);
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
            return response()->json($plan);
        } else {
            return response()->json(1);
        }
    }

    public function submit_preorders(Request $request)
    {
        $plan = Preorder::find($request->data_id);

        // Charge the User Account
        $user = User::find($request->user()->id);
        // check if user has enough balance
        if ($user->balance >= $plan->price) {
            $user->balance -= $plan->price;
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
            ]);

            if ($order) {
                // Create Transaction
                $transaction = Transactions::create([
                    'user_id' => $request->user()->id,
                    'transaction_id' => $reference,
                    'title' => 'MTN ' . $plan->size . ' Pre-Order',
                    'type' => "preorder",
                    'amount' => $plan->price,
                    'status' => 'processing',
                ]);

                return response()->json(0);
            } else {
                return response()->json(2);
            }
        } else {
            return response()->json(1);
        }
    }
}
