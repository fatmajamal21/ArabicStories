<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class WritersSeeder extends Seeder
{
    public function run()
    {
        $table = 'writers';
        if (!Schema::hasTable($table)) {
            return;
        }

        $writers = [
            [
                'name' => 'ليلى صايا ',
                'email' => 'lyla@bookworm.test',
                'phone' => '01000000001',
                'bio' => 'كاتبة سورية وعضو اتحاد الكتاب العرب  .',
                'is_verified' => 1,
                'is_active' => 1,
            ],
            [
                'name' => ' احمد جمال',
                'email' => 'ahmed@bookworm.test',
                'phone' => '01000000002',
                'bio' => 'كاتب فلسطيني وشاعر لل .',
                'is_verified' => 0,
                'is_active' => 1,
            ],
            [
                'name' => 'Writer Three',
                'email' => 'writer3@bookworm.test',
                'phone' => '01000000003',
                'bio' => 'قصص تعليمية قصيرة.',
                'is_verified' => 1,
                'is_active' => 1,
            ],
        ];

        foreach ($writers as $w) {
            $data = [
                'name' => $w['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'email')) {
                $data['email'] = $w['email'];
            }

            if (Schema::hasColumn($table, 'phone')) {
                $data['phone'] = $w['phone'];
            }

            if (Schema::hasColumn($table, 'bio')) {
                $data['bio'] = $w['bio'];
            }

            if (Schema::hasColumn($table, 'avatar')) {
                $data['avatar'] = null;
            }

            if (Schema::hasColumn($table, 'is_verified')) {
                $data['is_verified'] = $w['is_verified'];
            }

            if (Schema::hasColumn($table, 'is_active')) {
                $data['is_active'] = $w['is_active'];
            }

            if (Schema::hasColumn($table, 'user_id')) {
                $data['user_id'] = null;
            }

            $where = ['name' => $data['name']];
            if (isset($data['email']) && $data['email']) {
                $where = ['email' => $data['email']];
            }

            DB::table($table)->updateOrInsert($where, $data);
        }
    }
}
