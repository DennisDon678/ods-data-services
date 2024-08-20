<?php

namespace App\Http\Controllers;

use App\Models\Dataplans;
use App\Models\plan_type_list;
use App\Models\Profits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataManagerController extends Controller
{
    //

    public function generate_data_plan_types(){
        // Clear all
        $plan_types = plan_type_list::all();

        foreach ($plan_types as $plan){
            $plan->delete();
        }

        // Generate MTN Plan Types
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('API_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get(env('API_BASE_URL') . 'user')->json();

        $dataplans = $response['Dataplans'];

        // for Mtn data
        $mtn_plans = $dataplans['MTN_PLAN']['ALL'];

        // Generate array of plans
        $mtn_plans_array = [];

        foreach($mtn_plans as $plan){
            if (!in_array($plan['plan_type'], $mtn_plans_array)){
                array_push($mtn_plans_array,$plan['plan_type']);
            }
        }

        foreach($mtn_plans_array as $plan){
            $plc = plan_type_list::create([
                'network_id' => 1,
                'plan_type' => $plan
            ]);

            Profits::create([
                'plan_type' => $plc->id,
                'profit' => 0,
            ]);
        }

        // Glo network
        $glo_plans = $dataplans['GLO_PLAN']['ALL'];

        $glo_plans_array = [];
        foreach($glo_plans as $plan){
            if (!in_array($plan['plan_type'], $glo_plans_array)){
                array_push($glo_plans_array,$plan['plan_type']);
            }
        }

        foreach($glo_plans_array as $plan){
            $plc = plan_type_list::create([
                'network_id' => 2,
                'plan_type' => $plan
            ]);

            Profits::create([
                'plan_type' => $plc->id,
                'profit' => 0,
            ]);
        }


        // 9Mobile plans
        $mobile_plan = $dataplans['9MOBILE_PLAN']['ALL'];

        $mobile_plan_array = [];

        foreach($mobile_plan as $plan){
            if (!in_array($plan['plan_type'], $mobile_plan_array)){
                array_push($mobile_plan_array,$plan['plan_type']);
            }
        }

        foreach($mobile_plan_array as $plan){
            $plc = plan_type_list::create([
                'network_id' => 3,
                'plan_type' => $plan
            ]);

            Profits::create([
                'plan_type' => $plc->id,
                'profit' => 0,
            ]);
        }

        // Airtel
        $airtel_plans = $dataplans['AIRTEL_PLAN']['ALL'];

        $airtel_plans_array = [];

        foreach($airtel_plans as $plan){
            if (!in_array($plan['plan_type'], $airtel_plans_array)){
                array_push($airtel_plans_array,$plan['plan_type']);
            }
        }

        foreach($airtel_plans_array as $plan){
            $plc = plan_type_list::create([
                'network_id' => 4,
                'plan_type' => $plan
            ]);

            Profits::create([
                'plan_type' => $plc->id,
                'profit' => 0,
            ]);
        }

        return redirect()->back()->with('message', 'plan types updated successfully');

    }

    public function generate_data_plan(){
        // Clear all
        $data_plans = Dataplans::all();

        foreach ($data_plans as $data_plan){
            $data_plan->delete();
        }

        // Generate MTN Plan Types
        $response = Http::withHeaders([
            'Authorization' => 'Token '. env('API_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get(env('API_BASE_URL'). 'user')->json();

        $dataplans = $response['Dataplans'];

        // for Mtn data
        $mtn_plans = $dataplans['MTN_PLAN']['ALL'];

        foreach($mtn_plans as $plan){
            Dataplans::create([
                'data_id' => $plan['dataplan_id'],
                'plan_id' => plan_type_list::where('plan_type','=',$plan['plan_type'])->where('network_id', '=', 1)->first()->id,
                'size' => $plan['plan'],
                'validity' => $plan['month_validate'],
                'price' => $plan['plan_amount'],
            ]);
        }

        //for glo data
        $glo_plans = $dataplans['GLO_PLAN']['ALL'];

        foreach($glo_plans as $plan){
            Dataplans::create([
                'data_id' => $plan['dataplan_id'],
                'plan_id' => plan_type_list::where('plan_type','=',$plan['plan_type'])->where('network_id', '=', 2)->first()->id,
                'size' => $plan['plan'],
                'validity' => $plan['month_validate'],
                'price' => $plan['plan_amount'],
            ]);
        }

        // 9Mobile plans
        $mobile_plan = $dataplans['9MOBILE_PLAN']['ALL'];

        foreach($mobile_plan as $plan){
            Dataplans::create([
                'data_id' => $plan['dataplan_id'],
                'plan_id' => plan_type_list::where('plan_type','=',$plan['plan_type'])->where('network_id', '=', 3)->first()->id,
                'size' => $plan['plan'],
                'validity' => $plan['month_validate'],
                'price' => $plan['plan_amount'],
            ]);
        }

        // Airtel
        $airtel_plans = $dataplans['AIRTEL_PLAN']['ALL'];

        foreach($airtel_plans as $plan){
            Dataplans::create([
                'data_id' => $plan['dataplan_id'],
                'plan_id' => plan_type_list::where('plan_type','=',$plan['plan_type'])->where('network_id','=',4)->first()->id,
                'size' => $plan['plan'],
                'validity' => $plan['month_validate'],
                'price' => $plan['plan_amount'],
            ]);
        }

        return redirect()->back()->with('message', 'data plans updated successfully');
    }
}
