<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ResponderController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\NotificationController;
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
        $user=Auth::user();
        if($user->role_id==2){
            return redirect()->route('calculate-statistics');
        }else{
        return view('dashboard');}
    })->name('dashboard')->middleware((LockMiddleware::class));
});
Route::get('/lock', [LockScreenController::class, 'show'])->name('lock');
Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
Route::get('/organizations/register', [OrganizationController::class, 'view'])->name('organizations-register');
Route::post('/organizations/add',[OrganizationController::class,'addOrganization'])->name('organizations-add');


Route::get('/admin/add',[AdminController::class,'adminRegister'])->name('admin-register');
Route::post('/admin/register',[AdminController::class,'addAdmin'])->name('admin-add');
Route::get('/incident/report',[IncidentController::class,'create'])->name('incident-report');
Route::post('/incident/show',[IncidentController::class,'store'])->name('incident-show');

Route::get('/incident/view/{id}',[IncidentController::class,'viewIncident'])->name('incident.view');



Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard',[StatisticsController::class,'calculateStatistics'])->name('calculate-statistics');
    Route::get('/admin', [AdminController::class, 'show']);
    Route::get('/admins',[AdminController::class, 'viewAdmins'])->name('admins');
    Route::get('/heads',[AdminController::class,'viewOrganizationHeads'])->name('heads');
    Route::get('/users',[AdminController::class,'viewUsers'])->name('users');
    Route::get('/responders',[ResponderController::class,'index'])->name('responders');
    Route::get('/organizations',[OrganizationController::class,'viewOrganizations'])->name('organizations');
    Route::get('/organizations/{id}',[OrganizationController::class,'viewOrganizationDetails'])->name('view-organization');
    Route::get('/incidents',[IncidentController::class,'index'])->name('incidents');
    Route::get('/incidents/{id}',[IncidentController::class,'show'])->name('view-incident');
    Route::get('/incidents/{id}/dispatch',[ResponderController::class,'showOnlineResponders'])->name('dispatch-incident');
    Route::post('/incidents/{id}/send',[ResponderController::class,'dispatchResponders'])->name('incident-send');
    Route::get('/notifications',[NotificationController::class,'index'])->name('notifications.index');

    Route::get('users/edit-users/{id}', [AdminController::class, 'viewUserInfo'])->name('edit-user');
    Route::get('organizations/edit-organization/{id}', [OrganizationController::class, 'editOrganizationDetails'])->name('edit-organization');
    Route::put('organizations/update/{id}', [OrganizationController::class, 'updateOrganizationDetails'])->name('update-organization');
    Route::put('user/update/{id}', [AdminController::class, 'updateUserInfo'])->name('update-user');
    Route::delete('user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
    Route::delete('head/delete/{id}', [AdminController::class,'deleteOrganizationHead'])->name('delete-head');
    Route::delete('admin/delete/{id}', [AdminController::class,'deleteAdmin'])->name('delete-admin');
    Route::delete('responder/delete/{id}',[AdminController::class,'deleteResponder'])->name('delete-responder');
    Route::delete('organization/delete/{id}',[OrganizationController::class,'deleteOrganization'])->name('delete-organization');
});
Route::get('/respondents', 'RespondentController@index');
Route::post('/respondents/call', 'RespondentController@call');
Route::post('/respondents/text', 'RespondentController@text');

Route::get('/dispatch', 'DispatchController@index');
Route::post('/dispatch/handle', 'DispatchController@handle');
Route::post('/dispatch/record', 'DispatchController@record');
Route::get('/about-us', function () {
    return view('about_us');
})->name('about_us');
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// routes/web.php
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
