<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User_notification;

class Announcement extends Controller
{
    public function get_announcement()
    {
        $announcements = User_notification::first();
        return response()->json([
            'status' => 'success',
            'data' => $announcements,
        ]);
    }
}