<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\DirectMail;
use App\Models\Admin;
use App\Models\Manual_funding;
use App\Models\Pending_manual_fund;
use App\Models\Reserved_bank;
use App\Models\Transactions;
use App\Models\User;
use App\Models\User_Tag;
use App\Models\Vendor_config;
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
            'old_password' => 'required'
        ]);

        // confirm old password
        if (!password_verify($request->old_password, $request->user()->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Old password does not match'
            ]);
        }
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

    public function get_user_notifications(Request $request)
    {
        $user = $request->user();

        $notifications = Notifications::get_user_notifications($user->id);

        return response()->json([
            'notifications' => $notifications
        ]);
    }

    public function get_unread_user_notifications(Request $request)
    {
        $user = $request->user();

        $notifications = Notifications::get_unread_user_notifications($user->id);

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => count($notifications)
        ]);
    }

    public function mark_notification_as_read(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer'
        ]);

        $notification = Notifications::mark_notification_as_read($request->notification_id);

        if ($notification) {
            return response()->json([
                'message' => 'Notification marked as read'
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to mark notification as read'
            ]);
        }
    }

    public function mark_all_notifications_as_read(Request $request)
    {
        $user = $request->user();

        $notifications = Notifications::mark_all_notifications_as_read($user->id);

        if ($notifications) {
            return response()->json([
                'message' => 'All notifications marked as read'
            ]);
        } else {
            return response()->json([
                'error' => 'Failed to mark all notifications as read'
            ]);
        }
    }

    public function become_vendor(Request $request)
    {
        // get the one time fee for vendor
        $vendor_config = Vendor_config::first();

        // check if user is already a vendor
        $user = User::find($request->user()->id);
        if ($user->is_vendor) {
            return response()->json([
                'error' => 'You are already a vendor'
            ]);
        }

        // check if user has enough balance
        if ($user->balance < 0 || $user->balance < $vendor_config->onetime_fee) {
            return response()->json([
                'error' => 'You do not have enough balance'
            ]);
        }

        if (!$vendor_config) {
            return response()->json([
                'error' => 'Vendor config not found'
            ]);
        }

        return response()->json([
            'vendor_fee' => $vendor_config->onetime_fee,
        ]);
    }

    public function submit_vendor_request(Request $request)
    {
        // get the user
        $user = User::find($request->user()->id);

        // get the vendor config
        $vendor_config = Vendor_config::first();

        // check if user is already a vendor
        if ($user->is_vendor) {
            return response()->json([
                'error' => 'You are already a vendor'
            ]);
        }

        // check if user has enough balance
        if ($user->balance < $vendor_config->onetime_fee) {
            return response()->json([
                'error' => 'You do not have enough balance'
            ]);
        }

        // deduct the fee from user balance
        $user->balance -= $vendor_config->onetime_fee;
        $user->is_vendor = true;
        $user->save();

        // create a transaction
        Transactions::create([
            'user_id' => $user->id,
            'transaction_id' => uniqid(),
            'title' => 'Vendor Fee',
            'type' => 'withdrawal',
            'amount' => $vendor_config->onetime_fee,
            'status' => 'Successful',
        ]);

        // check referral
        if ($user->referred_by) {
            // give 50% commission to the referrer
            $referral_fee = $vendor_config->onetime_fee * 0.5;
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

        // return response
        return response()->json([
            'message' => 'You are now a vendor',
            'vendor_fee' => $vendor_config->onetime_fee,
            'balance' => $user->balance,
        ]);
    }
}
