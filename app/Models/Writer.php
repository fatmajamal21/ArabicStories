<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'avatar',
        'is_verified',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
