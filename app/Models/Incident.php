<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Incident extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable=[
       'incident_type',
       'location',
       'time_of_incident',
       'status',
    ];
}
