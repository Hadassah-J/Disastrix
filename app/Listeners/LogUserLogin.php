<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Log;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
   
        public function handle(UserLoggedIn $event)
        {
            // Access the user using $event->user
            $user = $event->user;
            
            // Log or perform any other actions
            Log::info('User Logged In: ' . $user->email);
        }
}
