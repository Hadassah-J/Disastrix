<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responder;

class Organization extends Model
{
    use HasFactory;

    public function Responder()
    {
        return $this->hasMany(Responder::class);
    }
    public function Deployment()
    {
        return $this->hasMany(Deployment::class);
    }

    protected $fillable=[
        'organization_name',
        'location',
        
    ];
}
