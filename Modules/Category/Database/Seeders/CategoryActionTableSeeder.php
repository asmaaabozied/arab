<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\CategoryAction;

class CategoryActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
//       facebook
            [
                'category_id' => 1,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.1',
            ],
            [
                'category_id' => 1,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.2',
            ],
            [
                'category_id' => 1,
                'name' => 'Share',
                'ar_name' => 'مشاركة',
                'price' => '0.25',
            ],
            [
                'category_id' => 1,
                'name' => 'View',
                'ar_name' => 'مشاهدة',
                'price' => '0.55',
            ],
//       google search
            [
                'category_id' => 2,
                'name' => 'Search',
                'ar_name' => 'بحث',
                'price' => '0.14',
            ],
            [
                'category_id' => 2,
                'name' => 'EnterKeyWork',
                'ar_name' => 'إدخال كلمة مفتاحية',
                'price' => '0.56',
            ],
            [
                'category_id' => 2,
                'name' => 'OpenWebSite',
                'ar_name' => 'زيارة موقع إلكتروني',
                'price' => '0.29',
            ],

//       YouTube
            [
                'category_id' => 3,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.4',
            ],
            [
                'category_id' => 3,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.5',
            ],
            [
                'category_id' => 3,
                'name' => 'Share',
                'ar_name' => 'مشاركة',
                'price' => '0.6',
            ],
            [
                'category_id' => 3,
                'name' => 'Subscribe',
                'ar_name' => 'متابعة',
                'price' => '0.7',
            ],
//       Polls
            [
                'category_id' => 4,
                'name' => 'ParticipateInTheOpinionPoll',
                'ar_name' => 'المشاركة في إستطلاع رأي',
                'price' => '0.66',
            ],
//       Test A Application Or Web Site
            [
                'category_id' => 5,
                'name' => 'Download',
                'ar_name' => 'تنزيل',
                'price' => '1.65',
            ],
            [
                'category_id' => 5,
                'name' => 'Rate',
                'ar_name' => 'تقييم',
                'price' => '0.33',
            ],
            [
                'category_id' => 5,
                'name' => 'Share',
                'ar_name' => 'مشاركة',
                'price' => '0.23',
            ],

//       Artificial intelligence test
            [
                'category_id' => 6,
                'name' => 'ParticipateInAnArtificialIntelligenceTest',
                'ar_name' => 'المشاركة في إختبار ذكاء إصطناعي',
                'price' => '2.01',
            ],
//       Twitter
            [
                'category_id' => 7,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.56',
            ],
            [
                'category_id' => 7,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.75',
            ],
            [
                'category_id' => 7,
                'name' => 'ReTwitte',
                'ar_name' => 'إعادة تغريد',
                'price' => '0.57',
            ],
//       Snapchat
            [
                'category_id' => 8,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.7',
            ],
            [
                'category_id' => 8,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.78',
            ],
            [
                'category_id' => 8,
                'name' => 'Subscribe',
                'ar_name' => 'متابعة',
                'price' => '0.34',
            ],
            [
                'category_id' => 8,
                'name' => 'JoinLiveStream',
                'ar_name' => 'الإنضمام إلى البث المباشر',
                'price' => '0.35',
            ],
//       TikTok
            [
                'category_id' => 9,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.76',
            ],
            [
                'category_id' => 9,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.37',
            ],
            [
                'category_id' => 9,
                'name' => 'Subscribe',
                'ar_name' => 'متابعة',
                'price' => '0.96',
            ],
            [
                'category_id' => 9,
                'name' => 'JoinLiveStream',
                'ar_name' => 'الإنضمام إلى البث المباشر',
                'price' => '0.79',
            ],

//       Instagram
            [
                'category_id' => 10,
                'name' => 'Comment',
                'ar_name' => 'تعليق',
                'price' => '0.23',
            ],
            [
                'category_id' => 10,
                'name' => 'Like',
                'ar_name' => 'إعجاب',
                'price' => '0.76',
            ],
            [
                'category_id' => 10,
                'name' => 'Subscribe',
                'ar_name' => 'متابعة',
                'price' => '0.23',
            ],
            [
                'category_id' => 10,
                'name' => 'JoinLiveStream',
                'ar_name' => 'الإنضمام إلى البث المباشر',
                'price' => '0.756',
            ],
            [
                'category_id' => 10,
                'name' => 'JoinGroup',
                'ar_name' => 'الإنضمام إلى مجموعة',
                'price' => '0.77',
            ],
//       GoogleMaps
            [
                'category_id' => 11,
                'name' => 'AddAddress',
                'ar_name' => 'إضافة عنوان',
                'price' => '0.54',
            ],
            [
                'category_id' => 11,
                'name' => 'RateAddress',
                'ar_name' => 'تقييم عنوان',
                'price' => '0.65',
            ],
            [
                'category_id' => 11,
                'name' => 'EditeAddress',
                'ar_name' => 'تعديل عنوان',
                'price' => '0.84',
            ],
            [
                'category_id' => 11,
                'name' => 'AddAddressDetails',
                'ar_name' => 'إضافة تفاصيل إلى عنوان',
                'price' => '0.23',
            ],
            [
                'category_id' => 11,
                'name' => 'EditeAddressDetails',
                'ar_name' => 'تعديل تفاصيل عنوان',
                'price' => '0.67',
            ],

        ];
        foreach ($actions as $action) {
            CategoryAction::create($action);
        }
    }
}
