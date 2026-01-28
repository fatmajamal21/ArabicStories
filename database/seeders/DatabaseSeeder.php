<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminsSeeder::class,
            // UsersSeeder::class,
            // WritersSeeder::class,
            // CategoriesSeeder::class,
            // StoriesSeeder::class,
            // CommentsSeeder::class,
            // FavoritesSeeder::class,
            // StoryViewsSeeder::class,
            // SettingsSeeder::class,
            // WorkersSeeder::class,
        ]);
    }
}
