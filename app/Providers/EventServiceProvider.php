<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\UserLoggedIn;
use App\Listeners\LogUserLogin;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserLoggedIn::class => [
            LogUserLogin::class,
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UpdateUserStatus',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UpdateUserStatus',
        ],
    ];
    
    public function boot(): void
    {
        //
    }
}
