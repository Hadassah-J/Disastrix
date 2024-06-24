<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password',

    ];
    protected $appends = [
        'profile_photo_url',
    ];
}
