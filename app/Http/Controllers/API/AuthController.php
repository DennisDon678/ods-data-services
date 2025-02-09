<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\mailerLiteController;
use App\Mail\password_reset_code;
use App\Models\reset_code;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate request
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
            'pin' => 'required|digits:4',
            'state' => 'required|string',
            'referal' => 'nullable|string',
        ]);
        // Check if email and phone already exist
        if (User::where('email', '=', $request->email)->first()) {
            return response([
                'error' => 'Email already exists',
            ], 400);
        }

        if (User::where('phone', '=', $request->phone)->first()) {
            return response([
                'error' => 'Phone number already exists',
            ], 400);
        }

        // Register user
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'pin' => $request->pin,
            'state' => $request->state,
            'referred_by' => $request->referal,
            'referral_id' => Str::random(6) . '_' . Str::random(3),
        ]);

        if ($user) {
            $mailer = new mailerLiteController();
            $mailer->subscribe(
                $request->firstname,
                $request->lastname,
                $request->email
            );
        }

        // return
        return response()->json([
            'authorization' => $user->createToken($user->email . '-auth')->plainTextToken
        ], 200);
    }

    public function login(Request $request)
    {
        // Validate request
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        // Check if user exists and password is correct
        $user = User::where('phone', '=', $request->phone)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'error' => 'Invalid credentials',
            ], 401);
        }


        // return
        return response()->json([
            'authorization' => $user->createToken($user->email . '-auth')->plainTextToken
        ], 200);
    }

    public function get_password_reset_token(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required',
        ]);

        // Check if user exists
        $user = User::where('email', '=', $request->email)->first();
        if (!$user) {
            return response([
                'error' => 'User not found',
            ], 404);
        }

        // Generate 4 digits reset password token
        $token = $token = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $code_save = reset_code::create([
            'user_id' => $user->id,
            'code' => $token,
            'email' => $user->email,
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);

        if ($code_save) {
            try {
                Mail::to($user->email, explode(' ', $user->name)[0])->send(new password_reset_code($token));
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json($th->getMessage());
            }
        }

        // return
        return response()->json([
            'message' => "Password reset code sent to your email address"
        ], 200);
    }

    public function verify_password_reset_token(Request $request)
    {
        // Check if token exists and is not expired
        $code = reset_code::where('code', '=', $request->token)->first();
        if (!$code || Carbon::parse($code->expire_at)->isPast()) {
            return response([
                'error' => 'Invalid or expired code',
            ], 404);
        }

        // return
        return response()->json([
            'user_id' => $code->user_id,
        ], 200);
    }

    public function reset_password(Request $request)
    {
        // validate user_id and password
        $request->validate([
            'user_id' => 'required',
            'password' => 'required|min:8',
        ]);

        // Find user by user_id
        $user = User::find($request->user_id);
        if (!$user) {
            return response([
                'error' => 'User not found',
            ], 404);
        }

        // Update password
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            // Delete reset code
            reset_code::where('user_id', '=', $request->user_id)->delete();

            return response()->json([
                'message' => 'Password reset successfully'
            ], 200);
        } else {
            return response()->json([
                'error' => 'Failed to reset password',
            ], 500);
        }
    }
}
