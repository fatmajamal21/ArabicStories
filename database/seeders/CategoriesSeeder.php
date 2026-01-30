<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'قصص ثقافية',
            'قصص علمية',
            'قصص أخلاقية',
            'قصص اجتماعية',
            'قصص دينية',
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'is_active' => true,
                ]
            );
        }
    }
}
