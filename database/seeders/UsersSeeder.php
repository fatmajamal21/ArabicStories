<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $table = 'users';
        if (!Schema::hasTable($table)) {
            return;
        }

        $users = [
            ['name' => 'User One', 'email' => 'user1@bookworm.test'],
            ['name' => 'User Two', 'email' => 'user2@bookworm.test'],
            ['name' => 'User Three', 'email' => 'user3@bookworm.test'],
        ];

        foreach ($users as $u) {
            $data = [
                'name' => $u['name'],
                'email' => $u['email'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'password')) {
                $data['password'] = Hash::make('password123');
            }

            if (Schema::hasColumn($table, 'is_active')) {
                $data['is_active'] = 1;
            }

            if (Schema::hasColumn($table, 'remember_token')) {
                $data['remember_token'] = Str::random(10);
            }

            DB::table($table)->updateOrInsert(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
