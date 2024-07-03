<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLoggedIn;
use App\Models\User;
use App\Notifications\LoginNotification;
use App\Notifications\LogoutNotification;

use Illuminate\Support\Facades\Notification;


class UpdateUserStatus
{

public function handle($event)
    {
        if ($event instanceof Login) {
            $event->user->is_online = true;
            $event->user->save();
            $admins=User::where('role_id',2)->get();
            Notification::send($admins,new LoginNotification($event->user));
        } elseif ($event instanceof Logout) {
            $event->user->is_online = false;
            $event->user->save();
            $admins=User::where('role_id',2)->get();
            Notification::send($admins,new LoginNotification($event->user));
        }
        }

    }

