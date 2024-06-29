<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responder extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'organization'
    ];
    protected $appends = [
        'profile_photo_url',
    ];
}
