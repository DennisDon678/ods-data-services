<?php

namespace App\Http\Controllers;

use App\Models\Cable_plan;
use Illuminate\Http\Request;

class TvController extends Controller
{
    //

    public function get_plans(Request $request){
        $plans = Cable_plan::where('cable_id','=', $request->cable_id)->first();
        return response()->json($plans);
    }
}
