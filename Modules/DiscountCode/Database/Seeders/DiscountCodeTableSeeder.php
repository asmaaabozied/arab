<?php

namespace Modules\DiscountCode\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\DiscountCode\Entities\DiscountCode;

class DiscountCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [
            [
                'code' => 'Cnsd74',
                'type' => 'MainCosts',
                'max_uses' => '10',
                'count_of_uses' => '0',
                'discount_amount' => '5',
                'starts_at' => '2022-10-05 00:00:01',
                'expires_at' => '2023-12-31 00:00:01',
                'description' => 'First Discount Code',
            ],
            [
                'code' => 'Mnsh61',
                'type' => 'AdditionalCosts',
                'max_uses' => '5',
                'count_of_uses' => '0',
                'discount_amount' => '2',
                'starts_at' => '2022-12-12 00:00:01',
                'expires_at' => '2023-12-24 00:00:01',
                'description' => 'Tow Discount Code',
            ],
            [
                'code' => 'Xvbb76',
                'type' => 'TotalCosts',
                'max_uses' => '6',
                'count_of_uses' => '0',
                'discount_amount' => '6',
                'starts_at' => '2022-01-15 00:00:01',
                'expires_at' => '2023-01-23 00:00:01',
                'description' => 'Three Discount Code',
            ],
            [
                'code' => 'Obdsg54',
                'type' => 'PayCosts',
                'max_uses' => '15',
                'count_of_uses' => '0',
                'discount_amount' => '10',
                'starts_at' => '2023-07-20 00:45:00',
                'expires_at' => '2024-07-28 15:45:00',
                'description' => 'Four Discount Code',
            ],


        ];

        foreach ($codes as $code){
            DiscountCode::create($code);
        }
    }
}
