<?php

namespace App\Http\Controllers;

use App\Models\Dataplans;
use App\Models\plan_type_list;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    //

    public function get_plan_types(Request $request)
    {
        if (isset($request->network_id)) {
            $plan_types = plan_type_list::where('network_id', '=', $request->network_id)->get();
            return response()->json($plan_types);
        } else {
            return response()->json('Invalid network request');
        }
    }

    public function get_data_plans(Request $request)
    {
        if (isset($request->plan_id)) {
            $plan_types = Dataplans::where('plan_id', '=', $request->plan_id)->get();
            return response()->json($plan_types);
        } else {
            return response()->json('Invalid network request');
        }
    }

    public function get_plan(Request $request)
    {
        if (isset($request->data_id)) {
            $data = Dataplans::where('data_id', '=', $request->data_id)->first();
            return response()->json($data);
        }
    }

    public function buy_data(Request $request)
    {
        // Check Users Balance
        $user = User::find($request->user()->id);
        $plan = Dataplans::find($request->plan_id);

        if ($user->balance >= $plan->price) {
            return response()->json(0);
        }else{
            return response()->json(1);
        }
    }
}
