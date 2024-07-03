<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\IncidentNotification;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Organization;
use App\Models\Head;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::all();
        return view('organization.incident-view',compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deploy.emergency-report');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'type' => 'required|string',
            'location' => 'required|string|max:300',
            'time' => 'required',
            'details' => 'required',
        ]);

        $incident=Incident::create([
            'incident_type' => $request['type'],
            'location'=> $request['location'],
            'time'=> $request['time'],
            'status' => 'pending',

        ]);

        return redirect()->route('incident.view',$incident->id);
    }

    public function viewIncident($id){
        $organizations=Organization::all();
        $incident=Incident::findOrFail($id);
        $geocodeUrl = 'https://api.tomtom.com/search/2/geocode/' . urlencode($incident->location) . '.json?key=RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw';
        $response = file_get_contents($geocodeUrl);
        $data = json_decode($response, true);

        $distances=[];

       if (isset($data['results']) && count($data['results']) > 0) {
        $position = $data['results'][0]['position'];
        $incident->latitude = $position['lat'];
        $incident->longitude = $position['lon'];
        $incident->save();
       } else {
        // Handle error or set default coordinates
        $incident->latitude = 0;
        $incident->longitude = 0;
       }
       foreach($organizations as $organization){
        $geocodeOrganizationUrl = 'https://api.tomtom.com/search/2/geocode/' . urlencode($organization->location) . '.json?key=RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw';
        $locationresponse = file_get_contents($geocodeOrganizationUrl);
        $locationdata = json_decode($locationresponse, true);
        if (isset($locationdata['results']) && count($locationdata['results']) > 0) {
            $orgposition = $locationdata['results'][0]['position'];
            $organization->latitude = $orgposition['lat'];
            $organization->longitude = $orgposition['lon'];
            $organization->save();
           } else {
            // Handle error or set default coordinates
            $organization->latitude = 0;
            $organization->longitude = 0;
           }

           $theta = $incident->longitude - $organization->longitude;
           $dist = sin(deg2rad($incident->latitude)) * sin(deg2rad($organization->latitude)) +  cos(deg2rad($incident->latitude)) * cos(deg2rad($organization->latitude)) * cos(deg2rad($theta));
           $dist = acos($dist);
           $dist = rad2deg($dist);
           $distance = $dist * 60 * 1.1515 * 1.609344; // distance in kilometers

           // Store distance
           $distances[$organization->id] = $distance;
           asort($distances);
           $nearestOrganizationId = key($distances);
           $nearestOrganization = Organization::findOrFail($nearestOrganizationId);
           $head=Head::where('organization',$nearestOrganization->organization_name)->first();
           $user=User::where('id',$head->user_id)->first();

           Notification::send($user,new IncidentNotification($incident));
       }

          return view('deploy.emergency-progress',compact('incident'),compact('nearestOrganization'));
       }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incident=Incident::findorFail($id);
        return view('deploy.view-incident',compact('incident'));
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
