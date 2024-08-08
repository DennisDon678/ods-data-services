<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function monify_webhook(Request $request)
    {
        // Process the webhook data and update your database or API accordingly.
        // You can access the webhook data via $request->all();

        // Send webhook data to a file webhook.json
        file_put_contents('webhook.json', json_encode($request->all()));

        return response('',200);
    }
}
