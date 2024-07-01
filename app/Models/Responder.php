<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Responder extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable=[
        'user_id',
        'organization',
        'status'
    ];
    protected $appends = [
        'profile_photo_url',
    ];
}
