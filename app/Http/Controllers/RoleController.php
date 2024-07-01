<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjusted the namespace to App\Models
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function show()
    {
        return view('users.edit-users'); // Adjusted to pass the id correctly to the view
    }

    public function assignRole(Request $request)
    {


    }}
