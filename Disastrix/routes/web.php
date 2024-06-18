<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\LockScreenController;
use App\Http\Middleware\LockMiddleware;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware((LockMiddleware::class));
});
Route::get('/lock', [LockScreenController::class, 'show'])->name('lock');
Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
Route::get('/organizations/register', [OrganizationRegisterController::class, 'view'])->name('organizations/register');
Route::get('/admin', [AdminController::class, 'show']);
Route::get('/users',[AdminController::class,'view'])->name('users');


Route::middleware('auth')->group(function () {
    Route::get('user/role', [RoleController::class, 'show'])->name('show');
    Route::put('user/role/put', [RoleController::class, 'assignRole'])->name('assign');
});

