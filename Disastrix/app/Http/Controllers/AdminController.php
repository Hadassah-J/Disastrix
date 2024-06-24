<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
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
    public function updateUserInfo($id, Request $request){
    
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:8',
            'roles'=> 'required|string'
        ]);


        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user with validated data
        $user->forceFill(
            [
                'name'=> $request['name'],
                'email'=> $request['email'],
                'password'=> Hash::make($request['password']),
                'role_id'=>Role::findByName($request['roles'])->id,
            ]
        );
        $role = Role::findByName($request['roles']);
        if ($role) {
            $user->syncRoles([$role]);
        }
        $user->save();



        // Redirect back with a success message
        return redirect()->route('edit-user', $user->id)->with('success', 'User information updated successfully.');
    }

public function AdminRegister(){
    return view('admin.admin-register');
}


public function addAdmin(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:8',
        ]);
        $user=User::create($validatedData);
        $user->role_id=Role::findByName('admin')->id;
        $user->assignRole('admin');
        $user->save();

        return Admin::create([
            'user_id'=>$user->id,
            'email'=>$user->email,
            'password'=> Hash::make($request['password']),
        ]);
    }


}
