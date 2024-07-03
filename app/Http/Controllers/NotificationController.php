<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;



class NotificationController extends Controller
{
    public function index(){
        $notifications=Auth::user()->notifications;
        $marked=Auth::user()->unreadNotifications->markAsRead();
        return view('notifications.index',compact('notifications'));
    }
}
