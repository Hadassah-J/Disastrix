<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminController extends Controller
{
    protected $users;
    protected $roles;

    public function __construct()
    {
        // Load all users data
        $this->users = User::all();
        $this->roles = Role::all();
    }
    public function show(){
        return view('admin.content');
    }
    public function view(){

        return view('admin.show-users', ['users' => $this->users]);
    }
    public function viewUserInfo($id){
         // Load specific user data by id
         $user = User::findOrFail($id);

         // Pass user data to the view
         return view('users.edit-users', ['user' => $user],['roles' => $this->roles]);
    }
    public function updateUserInfo(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'role' => 'required|string|exists:roles,name', 
            
            // Add other fields and validation rules as needed
        ]);
    
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Update user with validated data
        $user->update($validatedData);
        $role = Role::where('name', $request->role)->firstOrFail();
        $user->role_id = $role->id;
        $user->save();
    
    
        
    
        // Redirect back with a success message
        return redirect()->route('users.edit', $user->id)->with('success', 'User information updated successfully.');
    }
    

}
