<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class StoryViewsSeeder extends Seeder
{
    public function run()
    {
        $table = 'story_views';
        if (!Schema::hasTable($table)) {
            return;
        }

        $storyId = DB::table('stories')->orderBy('id')->value('id');
        if (!$storyId) {
            return;
        }

        $userId = DB::table('users')->orderBy('id')->value('id');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'story_id' => $storyId,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'user_id')) {
                $data['user_id'] = $userId;
            }

            if (Schema::hasColumn($table, 'ip')) {
                $data['ip'] = '127.0.0.1';
            }

            if (Schema::hasColumn($table, 'user_agent')) {
                $data['user_agent'] = 'Seeder';
            }

            DB::table($table)->insert($data);
        }

        if (Schema::hasColumn('stories', 'views_count')) {
            $count = DB::table($table)->where('story_id', $storyId)->count();
            DB::table('stories')->where('id', $storyId)->update(['views_count' => $count]);
        }
    }
}
