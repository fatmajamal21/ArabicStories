<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $table = 'settings';
        if (!Schema::hasTable($table)) {
            return;
        }

        $items = [
            'site_name' => 'Bookworm',
            'contact_email' => 'contact@bookworm.test',
        ];

        foreach ($items as $k => $v) {
            $data = [
                'key' => $k,
                'value' => $v,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table($table)->updateOrInsert(['key' => $k], $data);
        }
    }
}
