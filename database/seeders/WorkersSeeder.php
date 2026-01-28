<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Worker;

class WorkersSeeder extends Seeder
{
    public function run()
    {
        Worker::truncate();

        $workers = [
            [
                'name' => 'أحمد علي',
                'email' => 'ahmed@workers.com',
                'phone' => '0100000001',
                'bio' => 'عامل متخصص في القصص الصوتية للأطفال',
                'is_verified' => true,
                'is_active' => true,
            ],
            [
                'name' => 'سارة محمد',
                'email' => 'sara@workers.com',
                'phone' => '0100000002',
                'bio' => 'مشرفة محتوى ومراجعة لغوية',
                'is_verified' => true,
                'is_active' => true,
            ],
            [
                'name' => 'يوسف حسن',
                'email' => 'youssef@workers.com',
                'phone' => '0100000003',
                'bio' => 'تنفيذ ومتابعة نشر القصص',
                'is_verified' => false,
                'is_active' => true,
            ],
            [
                'name' => 'مريم خالد',
                'email' => 'mariam@workers.com',
                'phone' => '0100000004',
                'bio' => 'مساعدة إدارية',
                'is_verified' => false,
                'is_active' => false,
            ],
        ];

        foreach ($workers as $worker) {
            Worker::create($worker);
        }
    }
}
