<?php

namespace Modules\Currency\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Currency\Entities\Currency;
use Modules\Currency\Entities\SupportedCurrencyCode;

class CurrencyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'en_name' => 'USD',
                'ar_name' => 'دولار أمريكي',
                'rate' => 1.00,
                'icon' => 'Currencies/eJKsGNwBpv8FARbUQdxsaFB1exdkV8Mhls5QI7s2.png',
                'is_default' => 'true',
            ],
            [
                'en_name' => 'EGP',
                'ar_name' => 'جنيه مصري',
                'rate' => 30.89,
                'icon' => 'Currencies/D1M5vXzrBEDO2Ro5EcAFdOLTbZBhy8OsUOHMHmNM.png',
                'is_default' => 'false',
            ],

        ];

        $supported_currency_codes = [
            [
                'currency_name' => 'United States Dollar',
                'currency_code' => 'USD',
            ],

        ];
        foreach ($currencies as $currency){
            Currency::create($currency);
        }
        foreach ($supported_currency_codes as $supported_currency_code){
            SupportedCurrencyCode::create($supported_currency_code);
        }
    }
}
