<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Head extends Model
{
    use HasFactory,Notifiable;

    protected $fillable=[
        'user_id',
        'organization',


    ];
    protected $appends = [
        'profile_photo_url',
    ];
}
