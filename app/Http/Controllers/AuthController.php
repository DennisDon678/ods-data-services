<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function sign_up(Request $request)
    {
        // Check if email and phone already exist
        if (User::where('email', '=', $request->email)->first()) {
            return response()->json(2);
        }

        if (User::where('phone', '=', $request->phone)->first()) {
            return response()->json(3);
        }

        // Register user
        $user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'pin' => $request->pin,
            'state' => $request->state,
            'referred_by' => $request->referal,
            'referral_id' => Str::random(6) . '_' . Str::random(3),
        ]);

        if ($user && Auth::attempt([
            'email' => $request->phone,
            'password' => $request->password,
        ])) {
            return response()->json(0);
        } else {
            return response()->json(20);
        }
    }

    public function sign_in(Request $request){
        $mail = User::where('phone', $request->phone)->first();

        if (!$mail){
            return response()->json(1);
        }
        if(Auth::attempt([
            'email' => $mail->email,
            'password' => $request->password,
        ])){
            return response()->json(0);
        }else{
            return response()->json(2);
        }
        
    }
}
