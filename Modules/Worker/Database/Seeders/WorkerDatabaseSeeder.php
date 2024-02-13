<?php

namespace Modules\Worker\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Worker\Entities\Worker;

class WorkerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workers = [
            [
                'worker_number' => 'W-Y-M-S-RCH-RNUM1',
                'name' => 'Karam Awad',
                'email' => 'Karam@yahoo.com',
                'avatar' => null,
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'country_id' => 1,
                'city_id' => 1,
                'phone' => '00989644990039',
                'worker_level_id' => 1,
                'gender' => 'male',
                'description' => 'Hi, my name is Karam',
                'address' => 'Qzavin, Norozian Street',
                'zip_code' => '4621',
                'status' => 'enable',
                'wallet_balance' => 0.0,
                'paypal_account' => 'Karam@pay.com',
                'total_earns' => 0.0,

            ],
            [
                'worker_number' => 'W-Y-M-S-RCH-RNUM2',
                'name' => 'majed alkhair',
                'email' => 'majed@yahoo.com',
                'avatar' => null,
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'country_id' => 2,
                'city_id' => 6,
                'phone' => '0097402115225512',
                'worker_level_id' => 2,
                'gender' => 'male',
                'description' => 'Hi, my name is Majed',
                'address' => 'Qatar, Daoha',
                'zip_code' => '414',
                'status' => 'enable',
                'wallet_balance' => 0.0,
                'paypal_account' => 'majed@pay.com',
                'total_earns' => 0.0,

            ],

        ];
        foreach ($workers as $worker){
            Worker::create($worker);
        }
    }
}
