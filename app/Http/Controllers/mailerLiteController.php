<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mailerLiteController extends Controller
{
    public $baseUrl = 'https://connect.mailerlite.com/api/';
    
    public function getSubscribers(){
        $url = $this->baseUrl.'subscribers';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            "Authorization" => "Bearer ".env('MAILERLITE_API_KEY')
        ])->get($url)->json();
        return $response;
    }

    public function subscribe($firstname,$lastname,$email){
        $url = $this->baseUrl.'subscribers';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            "Authorization" => "Bearer ".env('MAILERLITE_API_KEY')
        ])->post($url,[
            'email' => $email,
            "fields" => [
                "name" => $firstname,
                "lastname" => $lastname,
            ]
        ])->json();
        return $response;
    }

    public function syncUsers(){
        $users = User::all();
        foreach($users as $user){
            $this->subscribe($user->name,$user->lastname,$user->email);

            sleep(10);
        }
        return response()->json(['message' => 'Users Synced Successfully']);
    }
}
