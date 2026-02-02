<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteFolder extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'folder_id');
    }
}
