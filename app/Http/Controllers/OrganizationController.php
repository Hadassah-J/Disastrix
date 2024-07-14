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

    public function viewOrganizations(){
        $organizations = Organization::all();
        return view('organization.organization-view',compact('organizations'));
    }

    public function viewOrganizationDetails($id){
        $organization=Organization::findOrFail($id);
        return view('organization.organization-view-details',compact('organization'));
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

        return redirect('/organizations')->with('success','Organization successfully added');


    }
    public function deleteOrganization($id){
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizations')->with('success', 'Organization deleted successfully.');
    }
    public function editOrganizationDetails($id){
        $organization=Organization::findOrFail($id);
        return view('organization.organization-edit',compact('organization'));
    }
    public function updateOrganizationDetails(Request $request,$id){
        $validatedData=$request->validate([
            'name' => 'required|string|max:255',
            'location'=>'required|string|max:300',

        ]);
        $organization=Organization::findOrFail($id);
        $organization->organization_name=$request['name'];
        $organization->location=$request['location'];
        $organization->save();
        return redirect()->route('view-organization',$id)->with('success','Organization details updated successfully');
    }
}
