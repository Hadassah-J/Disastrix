<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjusted the namespace to App\Models
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function show()
    {
        return view('popup'); // Adjusted to pass the id correctly to the view
    }

    public function assignRole($id,Request $request)
    {
        $user = Auth::user(); 
        $id=$user->id;

        $validatedData = $request->validate([
            'role' => 'required|string',
        ]);

        // Assign role based on the input
        if ($validatedData['role'] == 'Public user') {
            $user->role_id = 1;
            $user->save(); // Save the user before redirection
            return redirect('/dashboard');
        } elseif ($validatedData['role'] == 'Respondent') {
            $user->role_id = 2;
            $user->save(); // Save the user before redirection
            return redirect('/respondent');
        } else {
            abort(403, 'Page not found');
        }
    }
}
