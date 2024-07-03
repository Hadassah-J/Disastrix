<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\UserLoggedIn;
use App\Listeners\LogUserLogin;
use Illuminate\Auth\Events\Logout;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserLoggedIn::class => [
            LogUserLogin::class,
        ],
        Logout::class => [
            UpdateUserStatus::class,
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
