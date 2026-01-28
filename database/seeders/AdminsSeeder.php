<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->updateOrInsert(
            ['email' => 'admin@site.com'],
            [
                'name' => 'Main Admin',
                'password' => Hash::make('123456'),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
