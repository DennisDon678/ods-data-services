<?php

namespace App\Http\Controllers;

use App\Models\Cable_list;
use App\Models\Cable_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CableManagerController extends Controller
{
    //

    public function generate_cable_plan_types(){
        // clear all
        $cables = Cable_list::all();

        foreach ($cables as $cable){
            $cable->delete();
        }



        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('API_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get(env('API_BASE_URL') . 'user')->json();

        $cables = $response['Cableplan']['cablename'];

        foreach ($cables as $cable){
            Cable_list::create([
                'cable_id' => $cable['id'],
                'label' => $cable['name'],
            ]);
        }

        return redirect()->back()->with('message','cable list updated');
    }

    public function generate_cable_plan() {
        $cable = Cable_plan::all();
        foreach ($cable as $c){
            $c->delete();
        }

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('API_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get(env('API_BASE_URL') . 'user')->json();
            
        // Gotvs
        $gotvs = $response['Cableplan']['GOTVPLAN'];

        foreach ($gotvs as $gotv){
            Cable_plan::create([
                'plan_id' => $gotv['cableplan_id'],
                'plan_name' => $gotv['package'],
                'cable_id' => Cable_list::where('cable_id', '=', 1)->first()->id,
                'price' => $gotv['plan_amount'],
            ]);
        }

        // Dstvs
        $dstvs = $response['Cableplan']['DSTVPLAN'];
        foreach ($dstvs as $dstv){
            Cable_plan::create([
                'plan_id' => $dstv['cableplan_id'],
                'plan_name' => $dstv['package'],
                'cable_id' => Cable_list::where('cable_id', '=', 2)->first()->id,
                'price' => $dstv['plan_amount'],
            ]);
        }

        // Startimes
        $startimes = $response['Cableplan']['STARTIMEPLAN'];
        foreach ($startimes as $startime){
            Cable_plan::create([
                'plan_id' => $startime['cableplan_id'],
                'plan_name' => $startime['package'],
                'cable_id' => Cable_list::where('cable_id', '=', 3)->first()->id,
                'price' => $startime['plan_amount'],
            ]);
        }

        return redirect()->back()->with('message','cable plans updated');
    }
}
