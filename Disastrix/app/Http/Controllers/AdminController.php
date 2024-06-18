<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function show(){
        return view('admin.content');
    }
    public function view(){
        $users=User::all();
        return view('admin.show-users',compact('users'));
    }
}
