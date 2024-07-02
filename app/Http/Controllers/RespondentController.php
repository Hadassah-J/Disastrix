<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respondent;

class RespondentController extends Controller
{
    public function index()
    {
        $respondents = Respondent::all();
        return view('respondents.index', compact('respondents'));
    }

    public function call(Request $request)
    {
        // Logic for handling the call action
        return response()->json(['status' => 'Call initiated to ' . $request->phone_number]);
    }

    public function text(Request $request)
    {
        // Logic for handling the text action
        return response()->json(['status' => 'Text sent to ' . $request->phone_number]);
    }
}
