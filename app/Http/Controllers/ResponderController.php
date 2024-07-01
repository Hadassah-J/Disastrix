<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Responder;
use App\Models\User;
use App\Models\Head;
use Illuminate\Support\Facades\Auth;

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
        $head = Head::where('user_id', Auth::user()->id)->first();
        if ($head) {
            $organization = $head->organization;
            $responders = Responder::where('organization', $organization)->get();
        } else {
            // Handle the case where the authenticated user is not a head of any organization
            $responders = collect();
        }
        return view('organization.dispatch-responders',compact('responders'));
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
