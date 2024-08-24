<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ElectricityController extends Controller
{
    public function validate_meter_number(Request $request)
    {
        $response = Http::get(env('API_URI') . '/ajax/validate_meter_number', [
            'meternumber' => $request->disco,
            'disconame' => $request->cablename,
            'mtype' => $request->plan,
        ])->json();

        if ($response['invalid']) {
            return response()->json(1);
        } else {
            return response()->json($response);
        }
    }

    public function buy_electricity(Request $request)
    {

    }
}
