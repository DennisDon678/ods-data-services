<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //
    public function create_deposit(Request $request){

       $trans = Transactions::create([
            'user_id' => $request->user()->id,
            'transaction_id' => $request->reference,
            'title' => "Wallet Funding",
            'type' => "deposit",
            'amount' =>$request->amount,
            'status' => strtolower($request->status),
        ]);

        if($trans){
            $user = User::find($request->user()->id);
            $user->balance = $user->balance + $request->amount;
            $user->save();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }

    public function view_transaction($transaction){
        $trans = Transactions::where('transaction_id','=',$transaction)->first();
        return view('users.single_transaction', compact('trans'));
    }

    public function transactions(){
        $transactions = Transactions::where('user_id','=',Auth::user()->id)->paginate(20);

        return view('users.transactions',compact('transactions'));
    }

    public function profile(){
        return view('users.profile');
    }
}
