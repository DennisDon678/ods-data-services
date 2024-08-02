<?php

namespace App\Http\Controllers;

use App\Models\Cable_plan;
use Illuminate\Http\Request;

class TvController extends Controller
{
    //

    public function get_plans(Request $request){
        $plans = Cable_plan::where('cable_id','=', $request->cable_id)->get();
        return response()->json($plans);
    }

    public function get_plan_info(Request $request){
        $plan = Cable_plan::Where('plan_id','=',$request->plan_id)->first();
        return response()->json($plan);
    }
}
