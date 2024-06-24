<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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

        return view('admin.show-users', ['users' => $this->users],['roles' => $this->roles]);
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


public function addAdmin(Request $request) {
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
    ]);


        // Start transaction
        DB::beginTransaction();

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);

        // Assign the admin role to the user
        $user->assignRole('admin');

        // Create the admin record
        $admin = Admin::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'password' => Hash::make($validatedData['password']),
        ]);

        // Commit transaction
        DB::commit();

        return redirect('login')->with('success',201);

    }
}



