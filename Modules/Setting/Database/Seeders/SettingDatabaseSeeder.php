<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddonTableSeeder::class);
        $this->call(EmployerLevelTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(WorkerLevelTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
