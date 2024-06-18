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

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'role' => 'required|string|max:255',
        ]);

        // Find the user and update the role
        $user = User::find($request->id);
       if($request->role=="Public user"){
          $user->role_id=1;

       }else if($request->role== 'Respondent'){
        $user->role_id= 2;

       


    }else{
        abort(403,'Page not found');
    }
    $user->save();
    return redirect()->back()->with('success', 'User role updated successfully');

}}
