<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Story;

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

        $categories = Category::whereIn('name', [
            'قصص ثقافية',
            'قصص علمية',
            'قصص أخلاقية',
            'قصص اجتماعية',
            'قصص دينية',
        ])->get()->keyBy('name');

        $items = [
            'قصص ثقافية' => [
                ['title' => 'رحلة إلى المتحف', 'content' => 'يتعرف الطفل على معنى التراث وكيف نحافظ عليه.'],
                ['title' => 'حكاية المدن القديمة', 'content' => 'يكتشف الطفل اختلاف العادات بين المدن عبر الزمن.'],
            ],
            'قصص علمية' => [
                ['title' => 'سر الماء', 'content' => 'يتعلم الطفل حالات الماء بطريقة مبسطة.'],
                ['title' => 'كوكب الأرض', 'content' => 'يتعلم الطفل سبب الليل والنهار بشكل سهل.'],
            ],
            'قصص أخلاقية' => [
                ['title' => 'الصدق ينقذ الموقف', 'content' => 'يتعلم الطفل أن الصدق يختصر المشاكل.'],
                ['title' => 'وعد لا ينكسر', 'content' => 'يتعلم الطفل قيمة الالتزام بالوعد.'],
            ],
            'قصص اجتماعية' => [
                ['title' => 'صديق جديد', 'content' => 'يتعلم الطفل كيف يبدأ صداقة باحترام.'],
                ['title' => 'يوم التعاون', 'content' => 'يتعلم الطفل العمل الجماعي وتقسيم المهام.'],
            ],
            'قصص دينية' => [
                ['title' => 'الأمانة الصغيرة', 'content' => 'يتعلم الطفل معنى الأمانة في الحياة اليومية.'],
                ['title' => 'الرحمة بالغير', 'content' => 'يتعلم الطفل الرحمة ومساعدة من يحتاج.'],
            ],
        ];

        foreach ($items as $catName => $stories) {
            $cat = $categories->get($catName);
            if (!$cat) {
                continue;
            }

            foreach ($stories as $i => $s) {
                $age = $ageGroups[($cat->id + $i) % count($ageGroups)];

                Story::updateOrCreate(
                    ['title' => $s['title']],
                    [
                        'category_id' => $cat->id,
                        'age_group' => $age,
                        'content' => $s['content'],
                        'status' => 'published',
                    ]
                );
            }
        }
    }
}
