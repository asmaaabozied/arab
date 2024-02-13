<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'MohammadZam',
                'email' => 'MohammadZam@arabWorkers.com',
                'avatar' => null,
                'administrative_number' => 'MZ0001',
                'password'=>Hash::make('password'),
                'role_id' => 1,
                'status' => 'accepted',

            ],
            [
                'name' => 'MohammadGamel',
                'email' => 'MohammadGamel@arabWorkers.com',
                'avatar' => null,
                'administrative_number' => 'MG0002',
                'password'=>Hash::make('password'),
                'role_id' => 1,
                'status' => 'accepted',

            ],

        ];
        foreach ($admins as $admin){
            Admin::create($admin);
        }
    }
}
