<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Network_list;
use App\Models\Preorder;
use App\Models\Preordered;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vendors_preorder_config;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
    public function providers(Request $request)
    {
        // get all network providers
        $providers = Network_list::all();

        // check if provider has  preorder plans
        $preorder_providers = [];
        foreach ($providers as $provider) {
            // check if provider has preorder plans
            $plans = Preorder::where('network_id', $provider->id)->get();
            if ($plans->count() > 0) {
                $actual_plan = [];
                // check if user is vendor and adjust price from vendor config
                if ($request->user()->is_vendor) {
                    $vendor_config = Vendors_preorder_config::first();

                    foreach ($plans as $plan) {
                        $int_var = preg_replace('/[^0-9]/', '', $plan->size);

                        $price = $plan->price - ($vendor_config->discount_amount * $int_var);
                        $actual_plan[] = [
                            'data_id' => $plan->id,
                            'size' => $plan->size,
                            'price' => $price,
                            'network_id' => $plan->network_id,
                            'validity' => $plan->validity,
                        ];
                    }
                } else {
                    $actual_plan = $plans;
                }

                // modify the plan to use the right price
                $preorder_providers[] = [
                    'id' => $provider->network_id,
                    'name' => $provider->label,
                    'preorder_plans' => $actual_plan,
                ];
            }
        }

        if (count($preorder_providers) > 0) {
            return response()->json([
                'preorder_providers' => $preorder_providers,
            ]);
        } else {
            return response()->json([
                'message' => 'No providers found',
            ], 404);
        }
    }

    public function submit_preorder(Request $request)
    {
        // Validate request
        $request->validate([
            'number' => 'required|string',
            'data_id' => 'required|integer',
        ]);
        // get the plan from request
        $plan = Preorder::find($request->data_id);

        if (!$plan) {
            return response()->json([
                'message' => 'Plan not found',
            ], 404);
        }

        //check if user is vendor
        if ($request->user()->is_vendor) {
            $vendor_config = Vendors_preorder_config::first();
            $int_var = preg_replace('/[^0-9]/', '', $plan->size);
            $price = $plan->price - ($vendor_config->discount_amount * $int_var);
        } else {
            $price = $plan->price;
        }
        // check if user has enough balance
        if ($request->user()->balance < $price) {
            return response()->json([
                'message' => 'Insufficient balance',
            ], 400);
        }

        // Created Preordered 
        $reference = uniqid();

        // get the network provider
        $network = Network_list::where('network_id', $plan->network_id)->first();
        $order = Preordered::create([
            'reference' => $reference,
            'user_id' => $request->user()->id,
            'network' => $network->label,
            'size' => $plan->size,
            'number' => $request->number,
            'status' => 'processing',
            'amount' => $price,
        ]);

        if ($order) {
            // debit User Wallet
            $user = User::find($request->user()->id);
            $user->balance -= $price;
            $user->save();
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

            return response()->json([
                'message' => 'Preorder created successfully',
                'status' => 'success',
            ]);
        }
    }
}
