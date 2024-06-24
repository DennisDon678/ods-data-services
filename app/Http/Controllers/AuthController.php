<?php

namespace App\Http\Controllers;

use App\Mail\password_reset_code;
use App\Models\reset_code;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function sign_in(Request $request)
    {
        $mail = User::where('phone', $request->phone)->first();

        if (!$mail) {
            return response()->json(1);
        }
        if (Auth::attempt([
            'email' => $mail->email,
            'password' => $request->password,
        ])) {
            return response()->json(0);
        } else {
            return response()->json(2);
        }
    }

    public function reset_password(Request $request)
    {
        if (isset($request->get_user_code)) {
            // Find user by email address
            $user = User::where('email', '=', $request->email)->first();
            if ($user) {
                // send Mail to user with code
                $code =  rand(0, 999999);

                $code_save = reset_code::create([
                    'user_id' => $user->id,
                    'code' => $code,
                    'email' => $user->email,
                    'expires_at' => Carbon::parse(now())->addMinutes(10)
                ]);

                if ($code_save) {
                    try {
                        Mail::to($user->email, explode(' ', $user->name)[0])->send(new password_reset_code($code));
                    } catch (\Throwable $th) {
                        //throw $th;
                        return response()->json($th->getMessage());
                    }
                }
                // Send email to user
                return response()->json(0);
            } else {
                return response()->json(1);
            }
        } elseif (isset($request->verify_user_code)) {

            // Find the Code for reset code
            $code = reset_code::where('code', '=', $request->code)->first();

            if ($code) {
                if (Carbon::now() > Carbon::parse($code->expires_at)) {
                    return response()->json('err');
                } else {
                    $user = User::find($code->user_id);
                    $code->delete();
                    return response()->json([
                        'code' => 0,
                        'user' => $user->id
                    ]);
                }
            } else {
                return response()->json(1);
            }
        } else if (isset($request->update_user_pass)) {
            $user = User::find($request->user);
            $user->password =  Hash::make($request->password);

            if ($user->save()) {
                return response()->json(0);
            } else {
                return response()->json(1);
            }
        }
    }
}
