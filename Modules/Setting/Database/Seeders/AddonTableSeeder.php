<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Addon;

class AddonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addons = [
            [
                'title'=>'pin_task_on_top',
                'ar_title' => 'تثبيت المهمة في الأعلى',
                'fees'=>'5.5',
            ],
            [
                'title'=>'only_professional_worker',
                'ar_title' => 'عرض المهمة على العُمّال المحترفين فقط',
                'fees'=>'3.5',
            ],
            [
                'title'=>'daily_limit_worker',
                'ar_title' => 'تعيين حد يومي للعمل على المهمة',
                'fees'=>'1.5',
            ],
        ];
        foreach ($addons as $addon){
            Addon::create($addon);
        }
    }
}
