<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use App\Models\Organization;

class Responder extends Model
{
    use HasFactory;
    use Notifiable;

    public function Organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    protected $fillable=[
        'user_id',
        'organization',
        'status'
    ];
    protected $appends = [
        'profile_photo_url',
    ];
}
