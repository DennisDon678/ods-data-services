<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CableController extends Controller
{
    //
    public function validate_subscriber(Request $request){

        $response = Http::get(env('API_URI').'/ajax/validate_iuc?smart_card_number',[
            'smart_card_number' => $request->iuc,
            'cablename' => $request->cablename
        ])->json();

        if($response['invalid']){
            return response()->json(1);
        }else{
            return response()->json($response);
        }
       
    }

    public function buy_cable_subscription(Request $request){
        
    }
}
