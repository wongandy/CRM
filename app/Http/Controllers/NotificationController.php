<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        
        return view('notifications.index', compact('notifications'));
    }

    public function update(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return to_route('notifications.index');
    }

    public function destroy()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return to_route('notifications.index');
    }
}
