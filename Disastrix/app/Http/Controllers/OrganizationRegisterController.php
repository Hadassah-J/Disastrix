<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationRegisterController extends Controller
{
    public function view(){
        return view('organization/organization-register');
    }
}
