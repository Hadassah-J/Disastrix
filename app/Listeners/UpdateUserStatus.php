<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class UpdateUserStatus
{
    public function handle($event)
    {
        if ($event instanceof Login) {
            $event->user->is_online = true;
            $event->user->save();
        } elseif ($event instanceof Logout) {
            $event->user->is_online = false;
            $event->user->save();
        }
    }
}
