<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_account_info(Request $request){
        $user = $request->user();
        return response()->json([
            'user' => $user
        ]);
    }

    public function update_pin_code(Request $request){
        // validation
        $request->validate([
            'pin_code' => 'required|numeric|digits:4'
        ]);
        $user = User::find($request->user()->id);
        $user->pin = $request->pin_code;


        if($user->save()){
            return response()->json([
                'message' => 'Pin code updated successfully'
            ]);
        }else{
            return response()->json([
                'error' => 'Failed to update pin code'
            ]);
        }
    }

    public function reset_password(Request $request){
        // validation
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find($request->user()->id);
        $user->password =  Hash::make($request->password);

        if($user->save()){
            return response()->json([
               'message' => 'Password reset successfully'
            ]);
        } else{
            return response()->json([
                'error' => 'Failed to reset password'
            ]);
        }
    }

    public function check_tag_availability(Request $request){
        // validation
        $request->validate([
            'tag' =>'required|alpha_dash|max:20'
        ]);
        $tag = User_Tag::where('tag', $request->tag)->first();
        if($tag){
            return response()->json([
                'error' => 'Tag is already taken'
            ]);
        } else{
            return response()->json([
               'message' => 'Tag is available'
            ]);
        }
    }

    public function set_tag(Request $request){
        // validation
        $request->validate([
            'tag' =>'required|alpha_dash|max:20'
        ]);
        $user = User_Tag::where('user_id',$request->user()->id)->first();

        if(!$user){
            $user = new User_Tag();
            $user->user_id = $request->user()->id;
        }
        $user->tag = $request->tag;

        if($user->save()){
            return response()->json([
               'message' => 'Tag set successfully'
            ]);
        } else{
            return response()->json([
                'error' => 'Failed to set tag'
            ]);
        }
    }
}
