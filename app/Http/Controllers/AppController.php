<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppController extends Controller
{
    public function monify_webhook(Request $request)
    {
        
        $payload = json_encode($request->all());

        Storage::put('webhook.txt', $payload);

        http_response_code(200);
    }
}
