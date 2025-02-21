<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\external\vtu;
use App\Models\Cable_list;
use App\Models\Cable_plan;
use App\Models\Dataplans;
use App\Models\Network_list;
use App\Models\plan_type_list;
use App\Models\Profits;
use App\Models\Transactions as ModelsTransactions;
use App\Models\User;
use App\Models\Vendor_config;
use Illuminate\Http\Request;

class transactions extends Controller
{
    public function get_networks()
    {
        $networks = Network_list::all();

        return response()->json($networks);
    }

    public function buy_airtime(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'amount' => 'required|numeric|min:0',
            'network_id' => 'required|integer',
            'phone' => 'required|numeric',
            'pin' => 'required|digits:4',
        ]);

        // check pin 
        $correct_pin = $this->correct_pin($request->pin);
        if (!$correct_pin) {
            return response()->json(['message' => 'Incorrect pin'], 403);
        }

        // check User Balance with amount
        $enough_balance = $this->enough_balance($request->amount, $request->user()->balance);
        if (!$enough_balance) {
            return response()->json(['message' => 'Insufficient balance'], 403);
        }

        // Execute request from VTU
        $response = vtu::buy_airtime(
            $request->phone,
            $request->amount,
            $request->network_id,
        );

        // check error
        if (array_key_exists('error', $response)) {
            return response()->json($response);
        }

        // handle unsuccessful response
        if ($response['Status'] == 'failed') {
            return response()->json(['message' => 'Failed to process transaction. Check that number is valid and active. Else contact our support for assistance.'], 403);
        }

        // Debit User
        $this->debit_user_account($request->amount);

        // create Transaction Record
        ModelsTransactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $response['ident'],
            'title' => 'Airtime Purchase',
            'type' => "airtime",
            'amount' => $request->amount,
            'status' => $response['Status'],
            'number' => $response['mobile_number'],
        ]);

        return response()->json([
            'transaction_id' => $response['ident'],
            'amount' => $request->amount,
            'phone' => $request->phone,
            'network_id' => $request->network_id,
        ]);
    }

    public function buy_data(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'data_id' => 'required|integer',
            'network_id' => 'required|integer',
            'phone' => 'required|numeric',
            'pin' => 'required|digits:4',
        ]);

        // Check pin
        $correct_pin = $this->correct_pin($request->pin);
        if (!$correct_pin) {
            return response()->json(['message' => 'Incorrect pin'], 403);
        }

        // Get user and plan details
        $user = User::find($request->user()->id);
        $plan = Dataplans::where('data_id', $request->data_id)->first();
        $price = $this->apply_profit($plan);

        // Check user balance
        $enough_balance = $this->enough_balance($price, $user->balance);
        if (!$enough_balance) {
            return response()->json(['message' => 'Insufficient balance'], 403);
        }

        // Execute request from VTU
        $response = vtu::buy_data(
            $request->phone,
            $request->data_id,
            $request->network_id,
        );

        // Check for errors in the response
        if (array_key_exists('error', $response)) {
            return response()->json($response);
        }

        // Handle unsuccessful response
        if ($response['Status'] != 'successful') {
            return response()->json(['message' => 'Failed to process transaction. Check that number is valid and active. Else contact our support for assistance.'], 403);
        }

        // Debit user account
        $this->debit_user_account($price);

        // Create transaction record
        ModelsTransactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $response['ident'],
            'title' => $response['plan_name'] . ' to ' . $response['mobile_number'],
            'type' => "data",
            'amount' => $price,
            'status' => $response['Status'],
            'number' => $response['mobile_number'],
            'size' => $response['plan_name'],
        ]);

        return response()->json([
            'transaction_id' => $response['ident'],
            'amount' => $price,
            'mobile_number' => $request->mobile_number,
            'network_id' => $request->network_id,
        ]);
    }

    public function network_plans(Request $request)
    {
        $planTypes = plan_type_list::where('network_id', $request->network_id)->get();
        $plans = [];

        foreach ($planTypes as $planType) {
            $availablePlans = Dataplans::where('plan_id', $planType->id)->get();

            if (!isset($plans[$planType->plan_type])) {
                $plans[$planType->plan_type] = [];
            }

            foreach ($availablePlans as $availablePlan) {
                $price = $this->apply_profit($availablePlan);
                $availablePlan->price = $price;

                array_push($plans[$planType->plan_type], $availablePlan);
            }
        }

        return response()->json($plans);
    }

    public function cable_providers()
    {
        $cables = Cable_list::all();
        return response()->json($cables);
    }

    public function cable_plans(Request $request)
    {
        $plans = Cable_plan::where('cable_id', '=', $request->cable_id)->get();
        return response()->json($plans);
    }

    public function validate_iuc(Request $request)
    {
        $iuc = $request->iuc;
        $cablename = $request->cablename;
        $response = vtu::validate_iuc($iuc, $cablename);
        return response()->json($response);
    }

    public function buy_cable_subscription(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'cablename' => 'required|string',
            'plan' => 'required|string',
            'iuc' => 'required|numeric',
            'pin' => 'required|digits:4',
        ]);

        // Check pin
        $correct_pin = $this->correct_pin($request->pin);
        if (!$correct_pin) {
            return response()->json(['message' => 'Incorrect pin'], 403);
        }

        // Get user details
        $user = User::find($request->user()->id);

        // Check user balance
        $enough_balance = $this->enough_balance($request->amount, $user->balance);
        if (!$enough_balance) {
            return response()->json(['message' => 'Insufficient balance'], 403);
        }

        // Execute request from VTU
        $response = vtu::buy_cable(
            $request->cablename,
            $request->plan,
            $request->iuc
        );

        // Check for errors in the response
        if (array_key_exists('error', $response)) {
            return response()->json($response);
        }

        // Handle unsuccessful response
        if ($response['Status'] != 'successful') {
            return response()->json(['message' => 'Failed to process transaction. Check that number is valid and active. Else contact our support for assistance.'], 403);
        }

        // Debit user account
        $this->debit_user_account($request->amount);

        // Create transaction record
        ModelsTransactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $response['ident'],
            'title' => 'Cable Purchase',
            'type' => "cable",
            'amount' => $request->amount,
            'status' => $response['Status'],
            'number' => $response['smart_card_number'],
            'size' => $response['package'],
        ]);

        return response()->json([
            'transaction_id' => $response['ident'],
            'amount' => $request->amount,
            'smart_card_number' => $request->iuc,
            'cablename' => $request->cablename,
        ]);
    }

    public function validate_meter(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'meter_number' => 'required|numeric',
            'disco' => 'required|string',
            'plan' => 'required|string',
        ]);

        $meter_number = $request->meter_number;
        $disco = $request->disco;
        $plan = $request->plan;
        $response = vtu::validate_meter($disco, $meter_number, $plan);
        return response()->json($response);
    }

    public function electricity_providers() {}

    public function buy_electricity(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'disco' => 'required',
            'plan' => 'required',
            'meter_number' => 'required|numeric',
            'pin' => 'required|digits:4',
            'amount' => 'required|numeric',
        ]);

        // Check pin
        $correct_pin = $this->correct_pin($request->pin);
        if (!$correct_pin) {
            return response()->json(['message' => 'Incorrect pin'], 403);
        }

        // Get user details
        $user = User::find($request->user()->id);

        // Check user balance
        $enough_balance = $this->enough_balance($request->amount, $user->balance);
        if (!$enough_balance) {
            return response()->json(['message' => 'Insufficient balance'], 403);
        }

        // Execute request from VTU
        $response = vtu::buy_electricity(
            $request->disco,
            $request->meter_number,
            $request->plan,
            $request->amount
        );

        return response()->json($response);

        // Check for errors in the response
        if (array_key_exists('error', $response)) {
            return response()->json($response);
        }

        // Handle unsuccessful response
        if ($response['Status'] != 'Successful') {
            return response()->json(['message' => 'Failed to process transaction. Check that number is valid and active. Else contact our support for assistance.'], 403);
        }

        // Debit user account
        $this->debit_user_account($request->amount);

        // Create transaction record
        ModelsTransactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $response['ident'],
            'title' => 'Electricity Purchase',
            'type' => "electricity",
            'amount' => $request->amount,
            'status' => $response['Status'],
            'number' => $request->meter_number,
            'size' => $request->disco,
        ]);

        return response()->json([
            'transaction_id' => $response['ident'],
            'amount' => $request->amount,
            'meter_number' => $request->meter_number,
            'disco' => $request->disco,
        ]);
    }

    public function enough_balance($amount, $user_balance)
    {
        if ($amount <= $user_balance) {
            return true;
        } else {
            return false;
        }
    }

    public function correct_pin($pin)
    {
        $user = User::find(auth()->user()->id);
        if ($user->pin == $pin) {
            return true;
        } else {
            return false;
        }
    }

    public function debit_user_account($amount)
    {
        $user = User::find(auth()->user()->id);
        $user->balance -= $amount;
        $user->save();
    }

    // apply profit
    public function apply_profit($data)
    {
        $profit = Profits::where('plan_type', '=', $data->plan_id)->first();
        $profit =  ($profit->profit / 100) * $data->price;
        if (auth()->user()->is_vendor) {
            $vendor_config = Vendor_config::first();

            $price = ($data->price + $profit) - (($data->price + $profit) * ($vendor_config->discount / 100));
        } else {
            $price = $data->price + $profit;
        }

        return $price;
    }
}
