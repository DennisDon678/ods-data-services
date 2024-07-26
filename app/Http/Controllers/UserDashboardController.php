<?php

namespace App\Http\Controllers;

use App\Models\Airtime_to_cash;
use App\Models\Contacts;
use App\Models\Notification;
use App\Models\Reserved_bank;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use PDO;

class UserDashboardController extends Controller
{
    //
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
            "accountName" => env('APP_NAME') . '/' . Auth::user()->name,
            "currencyCode" => "NGN",
            "contractCode" => env('MONIFY_CONTRACT'),
            "customerEmail" => Auth::user()->email,
            "getAllAvailableBanks" => false,
            "preferredBanks" => ['035'],
        ])->json();
        // Save to database
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
        $contacts = Contacts::all();

        return view('users.contact',compact('contacts'));
    }


    public function airtime_to_cash(Request $request){
        $req = (object) $request->all();
        // dd($req);
        return view('users.airtime_to_cash', compact('req'));
    }

    public function airtime_to_cash_convert(Request $request){
        
        $amount = (int)filter_var($request->amount, FILTER_SANITIZE_NUMBER_INT)/100;
        $transactionId = uniqid();

        $cash = Airtime_to_cash::create([
            'amount' => $amount,
            'user_id' => $request->user()->id,
            'to' => $request->to,
            'from' => $request->from,
            'bank_name' => $request->bankName,
            'account_number' => $request->accountNumber,
            'account_name' => $request->accountName,
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

        if($trans && $cash){
            return response()->json(0);
        }else{
            return response()->json(1);
        }
    }

    public function referrals(){
        return view('users.referrals');
    }
}
