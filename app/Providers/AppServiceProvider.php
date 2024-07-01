<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{

    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UpdateUserStatus',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UpdateUserStatus',
        ],
    ];
    
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function(){
            return Password::min(8)
                  ->mixedCase()
                  ->letters()
                  ->numbers()
                  ->symbols();
        });
    }
}
