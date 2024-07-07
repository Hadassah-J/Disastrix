<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Responder;
use App\Models\User;
use App\Models\Head;
use Illuminate\Support\Facades\Auth;
use App\Models\Incident;
use App\Models\Deployer;
use App\Models\Deployment;
use App\Models\Organization;
use App\Notifications\DispatchNotification;
use Illuminate\Support\Facades\Notification;

class ResponderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $responders=Responder::all();
        return view('organization/responder-view', compact('responders'), compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function showOnlineResponders($id){
        $incident=Incident::findOrFail($id);
        $head = Head::where('user_id', Auth::user()->id)->first();
        $users=collect();
        if ($head) {
            $organization = $head->organization;
            $responders = Responder::where('organization', $organization)->get();
            $userIds = $responders->pluck('user_id'); // Collect all user IDs
            $users = User::whereIn('id', $userIds)->get()->keyBy('id');
        } else {
            // Handle the case where the authenticated user is not a head of any organization
            $responders = collect();
        }
        return view('organization.dispatch-responders',compact('responders','incident','users'));
    }

    public function dispatchResponders(Request $request,$id){
        $incident = Incident::findOrFail($id);
        $responders = $request->input('responders', []);
        foreach($responders as $responder){
           $deployer=Deployer::create([
              'responder_id' => $responder,
              'incident_id'=>$id
           ]);
           $responderperson=Responder::where('id',$responder)->first();
           $responderperson->status='dispatched';
           $responderperson->save();
           $userresponder=User::where('id',$responderperson->user_id)->first();
           Notification::send($responderperson,new DispatchNotification($incident));

        $organization=$responderperson->organization;

        $deployment=Deployment::create([
            'incident_id' => $id,
            'response_organization'=>$organization,
            'time_responded'=>now(),
            'deployment_force_number' => count($responders),
         ]);

        $incident->status="solved";
        $incident->save();
        return redirect('/responders')->with('message','Successfully dispatched');
    }}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
