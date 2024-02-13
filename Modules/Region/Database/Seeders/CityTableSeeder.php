<?php

namespace Modules\Region\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
//            Cities of Emirate
            [
                'name' => 'Dubai',
                'ar_name' => 'دبي',
                'country_id' => 1,
                'min_city_cost' => '0.30',

            ],
            [
                'name' => 'AbuDhabi',
                'ar_name' => 'أبو ظبي',
                'country_id' => 1,
                'min_city_cost' => '0.25',

            ],
            [
                'name' => 'Sharjah',
                'ar_name' => 'الشارقة',
                'country_id' => 1,
                'min_city_cost' => '0.20',

            ],

//            Cities of KAS

            [
                'name' => 'Jedda',
                'ar_name' => 'جدة',
                'country_id' => 2,
                'min_city_cost' => '0.60',

            ],

            [
                'name' => 'Mecca',
                'ar_name' => 'مكة المكرمة',
                'country_id' => 2,
                'min_city_cost' => '0.65',

            ],
            [
                'name' => 'Medina',
                'ar_name' => 'المدينة المنورة',
                'country_id' => 2,
                'min_city_cost' => '0.70',

            ],

//            Cities of Egypt
            [
                'name' => 'Qayro',
                'ar_name' => 'القاهرة',
                'country_id' => 3,
                'min_city_cost' => '0.50',

            ],
            [
                'name' => 'Alexandria',
                'ar_name' => 'الإسكندرية',
                'country_id' => 3,
                'min_city_cost' => '0.55',

            ],
            [
                'name' => 'Asyut',
                'ar_name' => 'أسيوط',
                'country_id' => 3,
                'min_city_cost' => '0.45',

            ],


//            Cities of Sudan

            [
                'name' => 'Khartom',
                'ar_name' => 'الخرطوم',
                'country_id' => 4,
                'min_city_cost' => '0.10',

            ],

            [
                'name' => 'Omdurman',
                'ar_name' => 'أم درمان',
                'country_id' => 4,
                'min_city_cost' => '0.15',

            ],

//            Cities of Yemen

            [
                'name' => 'Adan',
                'ar_name' => 'عدن',
                'country_id' => 5,
                'min_city_cost' => '0.10',

            ],
            [
                'name' => 'Sanaa',
                'ar_name' => 'صنعاء',
                'country_id' => 5,
                'min_city_cost' => '0.15',

            ],
            [
                'name' => 'Abyan',
                'ar_name' => 'أبين',
                'country_id' => 5,
                'min_city_cost' => '0.25',

            ],


//            Cities of USA
            [
                'name' => 'NewOrlyanz',
                'ar_name' => 'نيو أورلينز',
                'country_id' => 6,
                'min_city_cost' => '0.70',

            ],
            [
                'name' => 'NewYork',
                'ar_name' => 'نيويورك',
                'country_id' => 6,
                'min_city_cost' => '0.75',

            ],
            [
                'name' => 'Chicago',
                'ar_name' => 'شيكاغو',
                'country_id' => 6,
                'min_city_cost' => '0.80',

            ],
            [
                'name' => 'Houston',
                'ar_name' => 'هيوستن',
                'country_id' => 6,
                'min_city_cost' => '0.66',

            ],


//            Cities of Libya

            [
                'name' => 'Tarablos',
                'ar_name' => 'طرابلس',
                'country_id' => 7,
                'min_city_cost' => '0.60',

            ],
            [
                'name' => 'Benghazi',
                'ar_name' => 'بنغازي',
                'country_id' => 7,
                'min_city_cost' => '0.65',

            ],
            [
                'name' => 'Misrata',
                'ar_name' => 'مصراتة',
                'country_id' => 7,
                'min_city_cost' => '0.15',

            ],


//            Cities of Tunisia


            [
                'name' => 'Sousse',
                'ar_name' => 'سوسة',
                'country_id' => 8,
                'min_city_cost' => '0.56',

            ],
            [
                'name' => 'Sfax',
                'ar_name' => 'صفاقص',
                'country_id' => 8,
                'min_city_cost' => '0.32',

            ],
            [
                'name' => 'Tunis',
                'ar_name' => 'تونس العاصمة',
                'country_id' => 8,
                'min_city_cost' => '0.53',

            ],


//            Cities of Palestine
            [
                'name' => 'Qouds',
                'ar_name' => 'القدس المحتلة',
                'country_id' => 9,
                'min_city_cost' => '0.56',

            ],
            [
                'name' => 'Gaza',
                'ar_name' => 'غزة',
                'country_id' => 9,
                'min_city_cost' => '0.76',

            ],
            [
                'name' => 'Nablus',
                'ar_name' => 'نابلس',
                'country_id' => 9,
                'min_city_cost' => '0.13',

            ],
            [
                'name' => 'Yafa',
                'ar_name' => 'يافا',
                'country_id' => 9,
                'min_city_cost' => '0.98',

            ],


//            Cities of Syria

            [
                'name' => 'Aleppo',
                'ar_name' => 'حلب',
                'country_id' => 10,
                'min_city_cost' => '0.56',

            ],
            [
                'name' => 'Homs',
                'ar_name' => 'حمص',
                'country_id' => 10,
                'min_city_cost' => '0.87',

            ],
            [
                'name' => 'Latakia',
                'ar_name' => 'اللاذقية',
                'country_id' => 10,
                'min_city_cost' => '0.45',
            ],

        ];
        foreach ($cities as $city){
            City::create($city);
        }
    }
}
