<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\DirectMail;
use App\Models\Admin;
use App\Models\Manual_funding;
use App\Models\Pending_manual_fund;
use App\Models\Reserved_bank;
use App\Models\User;
use App\Models\User_Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function user_account_info(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'user' => $user
        ]);
    }

    public function update_pin_code(Request $request)
    {
        // validation
        $request->validate([
            'pin_code' => 'required|numeric|digits:4'
        ]);
        $user = User::find($request->user()->id);
        $user->pin = $request->pin_code;


        if ($user->save()) {
            return response()->json([
                'message' => 'Pin code updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to update pin code'
            ]);
        }
    }

    public function reset_password(Request $request)
    {
        // validation
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find($request->user()->id);
        $user->password =  Hash::make($request->password);

        if ($user->save()) {
            return response()->json([
                'message' => 'Password reset successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to reset password'
            ]);
        }
    }

    public function check_tag_availability(Request $request)
    {
        // validation
        $request->validate([
            'tag' => 'required|alpha_dash|max:20'
        ]);
        $tag = User_Tag::where('tag', $request->tag)->first();
        if ($tag) {
            return response()->json([
                'error' => 'Tag is already taken'
            ]);
        } else {
            return response()->json([
                'message' => 'Tag is available'
            ]);
        }
    }

    public function set_tag(Request $request)
    {
        // validation
        $request->validate([
            'tag' => 'required|alpha_dash|max:20'
        ]);
        $user = User_Tag::where('user_id', $request->user()->id)->first();

        if (!$user) {
            $user = new User_Tag();
            $user->user_id = $request->user()->id;
        }
        $user->tag = $request->tag;

        if ($user->save()) {
            return response()->json([
                'message' => 'Tag set successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to set tag'
            ]);
        }
    }

    public function wallet_funding_details(Request $request)
    {
        
        $manual_funding = Manual_funding::select(
            'account_name',
            'account_number',
            'bank_name'
        )->get();

        return response()->json([
            'manual_funding' => $manual_funding
        ]);
    }

    public function submit_manual_funding(Request $request)
    {
        // validation
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_bank' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $pending_funding = Pending_manual_fund::create([
            'user_id' => $request->user()->id,
            'sender_name' => $request->sender_name,
            'sender_bank' => $request->sender_bank,
            'amount' => abs($request->amount),
        ]);

        // create a pending transaction

        // notify admin 
        try {
            $info = "You Have a pending Manual Deposit";
            Mail::to(Admin::first()->email, 'admin')->send(new DirectMail($info, 'admin'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to send notification to admin'
            ]);
        }

        return response()->json([
            'message' => 'Manual funding request submitted successfully'
        ]);
    }
}
