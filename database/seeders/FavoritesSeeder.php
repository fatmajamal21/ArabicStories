<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FavoritesSeeder extends Seeder
{
    public function run()
    {
        $table = 'favorites';
        if (!Schema::hasTable($table)) {
            return;
        }

        $userId = DB::table('users')->orderBy('id')->value('id');
        $stories = DB::table('stories')->orderBy('id')->limit(2)->pluck('id')->toArray();

        if (!$userId || count($stories) === 0) {
            return;
        }

        foreach ($stories as $storyId) {
            DB::table($table)->updateOrInsert(
                ['user_id' => $userId, 'story_id' => $storyId],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
