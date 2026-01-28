<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $table = 'categories';
        if (!Schema::hasTable($table)) {
            return;
        }

        $items = [
            'قصص قبل النوم',
            'حكايات شعبية',
            'قصص تعليمية',
            'مغامرات',
            'أخلاق وسلوك',
            'حيوانات',
        ];

        foreach ($items as $name) {
            $data = [
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'slug')) {
                $data['slug'] = Str::slug($name);
            }

            if (Schema::hasColumn($table, 'is_active')) {
                $data['is_active'] = 1;
            }

            $where = ['name' => $name];
            if (isset($data['slug'])) {
                $where = ['slug' => $data['slug']];
            }

            DB::table($table)->updateOrInsert($where, $data);
        }
    }
}
