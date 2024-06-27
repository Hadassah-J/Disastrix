<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function view(){
        return view('organization.organization-register');
    }

    public function addOrganization(Request $request){
        $validatedData=$request->validate([
             'name' => 'required|string|max:255',
             'location'=>'required|string|max:300',

        ]);
        $organization=Organization::create([
          'organization_name' => $request['name'],
          'location'=> $request['location'],

        ]);

        return redirect('/')->with('success','Organization successfully added');


    }
}
