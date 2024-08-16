<?php

namespace App\Http\Controllers;

use App\Models\Airtime_to_cash;
use App\Models\Contact_config;
use App\Models\Contacts;
use App\Models\Notification;
use App\Models\Pending_manual_fund;
use App\Models\Reserved_bank;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vendor_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use PDO;


class UserDashboardController extends Controller
{
    //

    public function fund_wallet()
    {
        return view('users.forms.funding');
    }
    public function create_deposit(Request $request)
    {

        $trans = Transactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $request->reference,
            'title' => "Wallet Funding",
            'type' => "deposit",
            'amount' => $request->amount,
            'status' => strtolower($request->status),
        ]);

        if ($trans) {
            $user = User::find($request->user()->id);
            $user->balance = $user->balance + $request->amount;
            $user->save();

            // create notification and save to database
            Notification::create([
                'user_id' => $request->user()->id,
                'title' => "Deposit Successful",
                'description' => "You have deposited NGN" . $request->amount . " into your wallet",
                'status' => 0
            ]);


            return response()->json([
                'status' => 'success',
            ]);
        }
    }

    public function view_transaction($transaction)
    {
        $trans = Transactions::where('transaction_id', '=', $transaction)->first();
        return view('users.single_transaction', compact('trans'));
    }

    public function transactions()
    {
        $transactions = Transactions::where('user_id', '=', Auth::user()->id)->orderby('created_at', 'DESC')->paginate(20);

        return view('users.transactions', compact('transactions'));
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function generate_bank()
    {

        // Get Oauth token
        $token = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('MONIFY_KEY') . ':' . env('MONIFY_SECRET_KEY'))
        ])->post(env('MONIFY_URL') . '/api/v1/auth/login')->json()['responseBody']['accessToken'];

        // User token and get account
        $account = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post(env('MONIFY_URL') . '/api/v2/bank-transfer/reserved-accounts', [
            "accountReference" => Auth::user()->id,
            "accountName" => Auth::user()->name,
            "currencyCode" => "NGN",
            "contractCode" => env('MONIFY_CONTRACT'),
            "customerEmail" => Auth::user()->email,
            "customerName" => Auth::user()->name,
            "getAllAvailableBanks" => false,
            "preferredBanks" => ['232'],
        ])->json();
        // Save to database
        if ($account['requestSuccessful'] == true) {
            $create = Reserved_bank::create([
                'user_id' => Auth::user()->id,
                'account_number' => $account['responseBody']['accounts'][0]['accountNumber'],
                'account_name' => $account['responseBody']['accountName'],
                'bank_name' => $account['responseBody']['accounts'][0]['bankName'],
            ]);
            if ($create) {
                // Create notification
                $notification = Notification::create([
                    'user_id' => Auth::user()->id,
                    'title' => 'Bank Account Created',
                    'description' => 'Your bank account has been successfully created.',
                    'status' => 0
                ]);
                return response()->json(0);
            } else {
                return response()->json(1);
            }
        }else{
            return response()->json(2);
        }
    }

    public function change_password(Request $request)
    {
        // Check if the old password is correct
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->oldPassword, $user->password)) {
            // Update the password
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return response()->json(0);
        } else {
            return response()->json(1);
        }

        return response()->json($request->all());
    }

    public function change_pin(Request $request)
    {
        // Change pin
        $user = User::find(Auth::user()->id);
        $user->pin = $request->newPin;
        if ($user->save()) {
            return response()->json(0);
        } else {
            return response()->json(1);
        }
    }

    public function notifications()
    {
        $notifications = Notification::where('user_id', '=', Auth::user()->id)->orderby('created_at', 'DESC')->paginate(10);

        //run through all notifications
        foreach ($notifications as $notification) {
            if ($notification->status == 0) {
                $notification->status = 1;
                $notification->save();
            }
        }
        return view('users.notifications', compact('notifications'));
    }

    public function contact()
    {
        $contact = Contact_config::first();

        return view('users.contact', compact('contact'));
    }


    public function airtime_to_cash(Request $request)
    {
        $req = (object) $request->all();
        // dd($req);
        return view('users.airtime_to_cash', compact('req'));
    }

    public function airtime_to_cash_convert(Request $request)
    {

        $amount = (int)filter_var($request->amount, FILTER_SANITIZE_NUMBER_INT) / 100;
        $transactionId = uniqid();

        $cash = Airtime_to_cash::create([
            'amount' => $amount,
            'user_id' => $request->user()->id,
            'to' => $request->to,
            'from' => $request->from,
            'bank_name' => $request->a2cBank,
            'account_number' => $request->a2cAccountNumber,
            'account_name' => $request->a2cAccountName,
            'transaction_id' => $transactionId,
            'networks' => $request->networks,
        ]);

        $trans = Transactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $transactionId,
            'title' => "Airtime 2 Cash",
            'type' => "deposit",
            'amount' => $amount,
            'status' => strtolower('processing'),
        ]);

        if ($trans && $cash) {
            return response()->json(0);
        } else {
            return response()->json(1);
        }
    }

    public function referrals()
    {
        return view('users.referrals');
    }

    public function buy_mobile_data(Request $request)
    {
        return view('users.forms.data');
    }

    public function buy_airtime(Request $request)
    {
        return view('users.forms.airtime');
    }

    public function buy_cable_subscription(Request $request)
    {
        return view('users.forms.tv');
    }

    public function buy_electricity(Request $request)
    {
        return view('users.forms.electricity');
    }

    public function preorder_data()
    {
        return view('users.forms.preorder');
    }

    public function a_to_cash()
    {
        return view('users.forms.a2c');
    }

    public function become_a_vendor()
    {
        return view('users.vendor');
    }

    public function pay_vendor_fee(Request $request)
    {
        $user = User::find($request->id);
        $vendor_config = Vendor_config::first();

        // if balance is upto 2000
        if ($user->balance >= $vendor_config->onetime_fee) {
            $fee = $vendor_config->onetime_fee;
            $user->balance = $user->balance - $fee;
            $user->is_vendor = true;
            $user->save();

            // create a transaction
            Transactions::create([
                'user_id' => $request->id,
                'transaction_id' => uniqid(),
                'title' => 'Vendor Fee',
                'type' => 'withdrawal',
                'amount' => $fee,
                'status' => 'Successful',
            ]);

            if ($user->referred_by) {
                // give 50% commission to the referrer
                $referral_fee = $fee * 0.5;
                $referral = User::find($user->referred_by);
                $referral->balance = $referral->balance + $referral_fee;
                $referral->save();

                // create a transaction
                Transactions::create([
                    'user_id' => $user->referred_by,
                    'transaction_id' => uniqid(),
                    'title' => 'Referral Commission',
                    'type' => 'deposit',
                    'amount' => $referral_fee,
                    'status' => 'Successful',
                ]);
            }

            return response()->json(0);
        } else {
            return response()->json(1);
        }
    }

    public function add_manual_reqeust(Request $request)
    {
        Pending_manual_fund::create($request->except('_token'));

        return response()->json(0);
    }
}
