<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        ]);

        return redirect()->route('incident.view',$incident->id);
    }

    public function viewIncident($id){
        $incident=Incident::findOrFail($id);
        $geocodeUrl = 'https://api.tomtom.com/search/2/geocode/' . urlencode($incident->location) . '.json?key=RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw';
        $response = file_get_contents($geocodeUrl);
        $data = json_decode($response, true);

       if (isset($data['results']) && count($data['results']) > 0) {
        $position = $data['results'][0]['position'];
        $incident->latitude = $position['lat'];
        $incident->longitude = $position['lon'];
       } else {
        // Handle error or set default coordinates
        $incident->latitude = 0;
        $incident->longitude = 0;
       }



        return view('deploy.emergency-progress',compact('incident'));
    }

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
