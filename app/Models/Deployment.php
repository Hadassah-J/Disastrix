<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    use HasFactory;
    protected $fillable = [
        'incident_id',
        'response_organization',
        'time_responded',
        'deployment_force_number'
    ];
}
