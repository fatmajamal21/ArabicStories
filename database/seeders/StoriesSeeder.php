<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StoriesSeeder extends Seeder
{
    public function run()
    {
        $table = 'stories';
        if (!Schema::hasTable($table)) {
            return;
        }

        $writerId = DB::table('writers')->orderBy('id')->value('id');
        $writerId2 = DB::table('writers')->orderBy('id', 'desc')->value('id');
        $catId = DB::table('categories')->orderBy('id')->value('id');
        $catId2 = DB::table('categories')->orderBy('id', 'desc')->value('id');

        $stories = [
            [
                'title' => 'القطة والكتاب',
                'summary' => 'قصة قصيرة عن حب القراءة.',
                'content' => "وجدت قطة كتابا قديما.\nبدأت تقلب الصفحات.\nتعلمت كلمة جديدة كل يوم.\nفي النهاية أصبحت تقرأ لأصدقائها.",
                'status' => 'published',
                'age_group' => '6-8',
                'writer_id' => $writerId,
                'category_id' => $catId,
                'published_at' => now(),
                'reject_reason' => null,
            ],
            [
                'title' => 'سامي والصدق',
                'summary' => 'قصة عن قول الحقيقة.',
                'content' => "كسر سامي لعبة في البيت.\nخاف أن يعترف.\nقرر أن يقول الحقيقة.\nسامحه أهله وتعلم درسا.",
                'status' => 'pending',
                'age_group' => '6-8',
                'writer_id' => $writerId2,
                'category_id' => $catId2,
                'published_at' => null,
                'reject_reason' => null,
            ],
            [
                'title' => 'السلحفاة السريعة',
                'summary' => 'قصة عن التدريب.',
                'content' => "تدربت السلحفاة كل يوم.\nلم تستسلم.\nبعد مدة أصبحت أسرع من قبل.\nفرح الجميع.",
                'status' => 'rejected',
                'age_group' => '3-5',
                'writer_id' => $writerId,
                'category_id' => $catId,
                'published_at' => null,
                'reject_reason' => 'النص يحتاج تفاصيل أكثر.',
            ],
            [
                'title' => 'مغامرة في الحديقة',
                'summary' => 'قصة عن ملاحظة التفاصيل.',
                'content' => "دخلت ليلى الحديقة.\nلاحظت أثرا صغيرا.\nاتبعت الأثر حتى وجدت عصفورا يحتاج ماء.\nسقته وعاد للطيران.",
                'status' => 'published',
                'age_group' => '9-12',
                'writer_id' => $writerId2,
                'category_id' => $catId2,
                'published_at' => now(),
                'reject_reason' => null,
            ],
        ];

        foreach ($stories as $s) {
            $slug = Str::slug($s['title']);

            $data = [
                'title' => $s['title'],
                'slug' => $slug,
                'summary' => $s['summary'],
                'content' => $s['content'],
                'status' => $s['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn($table, 'age_group')) {
                $data['age_group'] = $s['age_group'];
            }

            if (Schema::hasColumn($table, 'writer_id')) {
                $data['writer_id'] = $s['writer_id'];
            }

            if (Schema::hasColumn($table, 'category_id')) {
                $data['category_id'] = $s['category_id'];
            }

            if (Schema::hasColumn($table, 'published_at')) {
                $data['published_at'] = $s['published_at'];
            }

            if (Schema::hasColumn($table, 'reject_reason')) {
                $data['reject_reason'] = $s['reject_reason'];
            }

            if (Schema::hasColumn($table, 'views_count')) {
                $data['views_count'] = 0;
            }

            if (Schema::hasColumn($table, 'likes_count')) {
                $data['likes_count'] = 0;
            }

            if (Schema::hasColumn($table, 'image')) {
                $data['image'] = null;
            }

            if (Schema::hasColumn($table, 'cover')) {
                $data['cover'] = null;
            }

            if (Schema::hasColumn($table, 'audio')) {
                $data['audio'] = null;
            }

            DB::table($table)->updateOrInsert(
                ['slug' => $slug],
                $data
            );
        }
    }
}
