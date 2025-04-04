<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;


class Notifications extends Controller
{

    // create Notification
    public static function create_notification($user_id, $title, $description, $status = 0)
    {
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->title = $title;
        $notification->description = $description;
        $notification->status = $status;
        return $notification->save();
    }

    // get notification for user
    public static function get_user_notifications($user_id)
    {
        return Notification::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
    }

    // get unread notification for user
    public static function get_unread_user_notifications($user_id)
    {
        return Notification::where('user_id', $user_id)->where('status', 0)->orderBy('created_at', 'desc')->get();
    }

    // mark notification as read
    public static function mark_notification_as_read($notification_id)
    {
        $notification = Notification::find($notification_id);
        if ($notification) {
            $notification->status = 1;
            return $notification->save();
        }
        return false;
    }

    // mark all notifications as read
    public static function mark_all_notifications_as_read($user_id)
    {
        return Notification::where('user_id', $user_id)->update(['status' => 1]);
    }
}
