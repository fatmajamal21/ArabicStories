<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\Category;

class StoriesSeeder extends Seeder
{
    public function run(): void
    {
        $ageGroups = [
            'من 3-5 سنوات',
            'من 5-7 سنوات',
            'من 7-9 سنوات',
            'من 9-12 سنة',
            'من 12-15 سنة',
        ];

        $storiesByCategory = [
            'قصص ثقافية' => [
                ['title' => 'رحلة إلى المتحف', 'content' => 'قصة تعرّف الطفل على أهمية الآثار والتراث.'],
                ['title' => 'حكاية المدن القديمة', 'content' => 'قصة عن اختلاف الحضارات عبر الزمن.'],
            ],
            'قصص علمية' => [
                ['title' => 'سر الماء', 'content' => 'قصة تشرح حالات الماء بطريقة مبسطة.'],
                ['title' => 'كوكب الأرض', 'content' => 'قصة تعليمية عن الليل والنهار.'],
            ],
            'قصص أخلاقية' => [
                ['title' => 'الصدق أفضل طريق', 'content' => 'قصة تعزز قيمة الصدق عند الأطفال.'],
                ['title' => 'الوعد الصادق', 'content' => 'قصة عن أهمية الالتزام بالوعد.'],
            ],
            'قصص اجتماعية' => [
                ['title' => 'صديق جديد', 'content' => 'قصة عن تكوين الصداقات.'],
                ['title' => 'يوم التعاون', 'content' => 'قصة عن العمل الجماعي.'],
            ],
            'قصص دينية' => [
                ['title' => 'الأمانة', 'content' => 'قصة بسيطة عن الأمانة.'],
                ['title' => 'الرحمة', 'content' => 'قصة تعزز قيمة الرحمة.'],
            ],
        ];

        foreach ($storiesByCategory as $categoryName => $stories) {
            $category = Category::where('name', $categoryName)->first();

            if (!$category) {
                continue;
            }

            foreach ($stories as $index => $story) {
                Story::updateOrCreate(
                    ['title' => $story['title']],
                    [
                        'category_id' => $category->id,
                        'age_group' => $ageGroups[$index % count($ageGroups)],
                        'content' => $story['content'],
                        'status' => 'published',
                    ]
                );
            }
        }
    }
}
