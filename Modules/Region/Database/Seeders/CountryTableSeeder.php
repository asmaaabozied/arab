<?php

namespace Modules\Region\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'United Arab Emirates',
                'ar_name' => 'الإمارات العربية المتحدة',
                'calling_code' => '00971',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/Wcf7XbQVpzYrCQVamiG2m4rEUSiRm4Iffs5Nrfyp.svg',
            ],
            [
                'name' => 'Kingdom Saudi Arabia',
                'ar_name' => 'المملكة العربية السعودية',
                'calling_code' => '00966',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/fHoBr879A7gkeoxt32PNZARkvth3PgyFtLkmhDwI.svg',
            ],
            [
                'name' => 'Egypt',
                'ar_name' => 'مصر',
                'calling_code' => '0020',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/l8pL4uCxIMhortdoA6xaqjggQ1VFFvyZlQLI2nIc.svg',
            ],
            [
                'name' => 'Sudan',
                'ar_name' => 'السودان',
                'calling_code' => '00249',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/dfojt1s3qFxD5mJ40YLoZnTn9ojAFYdwRn4aKBxL.svg',
            ],
            [
                'name' => 'Yemen',
                'ar_name' => 'اليمن',
                'calling_code' => '00967',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/p1CM8Pio5jabFkirynIc2n4BOH9Ou2I0h3iMV6za.svg',
            ],
            [
                'name' => 'USA',
                'ar_name' => 'الولايات المتحدة الأمريكية',
                'calling_code' => '001',
                'is_arabic' => 'false',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/qIc2BgQY9yk69fkomMpAMs7ibQaFLArFokcD8Tuj.png',
            ],
            [
                'name' => 'Libya',
                'ar_name' => 'ليبيا',
                'calling_code' => '00218',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/FdafTH3ezWrP4GX9iXR2n9QzXpckmen7ujKXs1Wo.svg',
            ],
            [
                'name' => 'Tunisia',
                'ar_name' => 'تونس',
                'calling_code' => '00216',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/sTEjgz8IH2kYQ4OTvLf1Xlnic1Hg1epeMAKDCk6p.svg',
            ],
            [
                'name' => 'Palestine',
                'ar_name' => 'فلسطين',
                'calling_code' => '00970',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/oaBm91iiEW4PgrvHv7Omr1uR9I6HNu1sKQoGJtLR.svg',
            ],
            [
                'name' => 'Syria',
                'ar_name' => 'سوريا',
                'calling_code' => '00963',
                'is_arabic' => 'true',
                'min_price' => '0.20',
                'flag' => 'Countries/flags/KCGhrkp7b6MhnWiDOdJvCh2wDmSf41UUljR7KFYE.png',
            ],

        ];
        foreach ($countries as $country){
            Country::create($country);
        }
    }
}
