<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'avatar_base64',
        'avatar_mime',
        'bio',
        'is_verified',
        'is_active',
    ];
}
