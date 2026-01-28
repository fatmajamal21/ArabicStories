<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        $table = 'comments';
        if (!Schema::hasTable($table)) {
            return;
        }

        $userId = DB::table('users')->orderBy('id')->value('id');
        $storyId = DB::table('stories')->orderBy('id')->value('id');

        if (!$userId || !$storyId) {
            return;
        }

        $items = [
            'قصة جميلة.',
            'أحببت النهاية.',
            'اللغة سهلة ومناسبة.',
        ];

        foreach ($items as $body) {
            $data = [
                'story_id' => $storyId,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'body')) {
                $data['body'] = $body;
            } elseif (Schema::hasColumn($table, 'comment')) {
                $data['comment'] = $body;
            }

            if (Schema::hasColumn($table, 'is_hidden')) {
                $data['is_hidden'] = 0;
            }

            DB::table($table)->insert($data);
        }
    }
}
