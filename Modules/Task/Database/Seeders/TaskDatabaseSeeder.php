<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaskTableSeeder::class);
        $this->call(TaskStatusTableSeeder::class);
        $this->call(TaskWorkFlowTableSeeder::class);

        $this->call(TaskCountryTableSeeder::class);
        $this->call(TaskCityTableSeeder::class);
        $this->call(TaskCategoryActionTableSeeder::class);


    }
}
