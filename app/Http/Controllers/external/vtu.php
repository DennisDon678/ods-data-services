<?php

namespace App\Http\Controllers\external;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vtu extends Controller
{
    public static function buy_airtime($phone, $amount, $network_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_BASE_URL') . 'topup/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"network":' . $network_id . ',
                "amount":' . $amount . ',
                "mobile_number":"' . $phone . '",
                "Ported_number":true,
                "airtime_type":"VTU"
                }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Token ' . env('API_TOKEN'),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);

        curl_close($curl);

        return $response;
    }

    public static function buy_data($phone, $plan_id, $network_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_BASE_URL') . 'data/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"network":' . $network_id . ',
                    "mobile_number": "' . $phone . '",
                    "plan": ' . $plan_id . ',
                    "Ported_number":true
                    }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Token ' . env('API_TOKEN'),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);

        curl_close($curl);

        return $response;
    }
}
