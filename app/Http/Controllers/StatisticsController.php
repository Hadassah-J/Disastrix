<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deployment;
use App\Models\Incident;
use App\Models\Role;
use App\Models\Organization;
use App\Models\Responder;


class StatisticsController extends Controller
{
    public function calculateStatistics(){
        $users=User::all()->count();
        $activeincidents=Incident::where('status','pending')->count();
        $activerespondents=Responder::where('status','online')->count();
        $solvedincidents=Incident::where('status','solved')->count();

        return view('admin.admin-dashboard',compact('activeincidents','activerespondents','solvedincidents','users'));
    }
}
