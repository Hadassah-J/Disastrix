<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respondent;
use App\Models\CallLog; // Assuming a model for recording call logs

class DispatchController extends Controller
{
    public function index()
    {
        $respondents = Respondent::all();
        return view('dispatch.index', compact('respondents'));
    }

    public function handle(Request $request)
    {
        // Logic to handle incoming calls/texts and assign to respondents
        return response()->json(['status' => 'Handled']);
    }

    public function record(Request $request)
    {
        // Logic to record information into the database
        $log = CallLog::create([
            'respondent_id' => $request->respondent_id,
            'user_id' => $request->user_id,
            'details' => $request->details,
        ]);
        return response()->json(['status' => 'Recorded', 'log' => $log]);
    }
}
