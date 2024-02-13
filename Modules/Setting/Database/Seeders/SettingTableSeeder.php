<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'home_site_logo' => '1667894613logo.png',
                'dashboard_site_logo' => 'dashboard-logo.png',
                'min_withdraw_limit' => '10.00',
                'fees_per_transfer_wallet_balance' => '0.0',
                'fees_per_withdraw_wallet_using_paypal' => '20.0',
                'fees_per_charge_wallet_using_paypal' => '2.0',
                'days_added_to_task_end_date_when_reject_task_proof'=>1,
                'pin_in_top_task_limit_count'=>3,
                'exchange_rate_api_key'=>'e4f997454b94bf02994238be',

            ]
        ];
        foreach ($settings as $setting){
            Setting::create($setting);
        }
    }
}
