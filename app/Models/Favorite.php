<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'story_id',
        'folder_id',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function folder()
    {
        return $this->belongsTo(FavoriteFolder::class, 'folder_id');
    }
}
