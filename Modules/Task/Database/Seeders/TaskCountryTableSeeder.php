<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskCountry;

class TaskCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'task_id' => 1,
                'country_id' => 1,

            ],
            [
                'task_id' => 2,
                'country_id' => 2,

            ],
            [
                'task_id' => 3,
                'country_id' => 3,

            ],
            [
                'task_id' => 4,
                'country_id' => 4,

            ],
            [
                'task_id' => 5,
                'country_id' => 5,

            ],
            [
                'task_id' => 6,
                'country_id' => 6,

            ],
            [
                'task_id' => 7,
                'country_id' => 7,

            ],
            [
                'task_id' => 8,
                'country_id' =>8,

            ],
            [
                'task_id' => 9,
                'country_id' =>9,

            ],
            [
                'task_id' => 10,
                'country_id' =>10,

            ],

        ];
        foreach ($data as $datum){
            TaskCountry::create($datum);
        }
    }
}
