<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskCity;

class TaskCityTableSeeder extends Seeder
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
                'city_id' => 1,

            ],
            [
                'task_id' => 1,
                'city_id' => 2,

            ],
            [
                'task_id' => 1,
                'city_id' => 3,

            ],

            [
                'task_id' => 2,
                'city_id' => 4,

            ],
            [
                'task_id' => 2,
                'city_id' => 6,

            ],
            [
                'task_id' => 3,
                'city_id' => 8,

            ],
            [
                'task_id' => 4,
                'city_id' => 11,

            ],
            [
                'task_id' => 5,
                'city_id' => 13,

            ],
            [
                'task_id' => 5,
                'city_id' => 14,

            ],

            [
                'task_id' => 6,
                'city_id' => 16,

            ],
            [
                'task_id' => 6,
                'city_id' => 17,

            ],

            [
                'task_id' => 7,
                'city_id' => 19,

            ],
            [
                'task_id' => 7,
                'city_id' => 20,

            ],
            [
                'task_id' => 7,
                'city_id' => 21,

            ],
            [
                'task_id' => 8,
                'city_id' => 22,

            ],
            [
                'task_id' => 8,
                'city_id' => 23,

            ],
            [
                'task_id' => 8,
                'city_id' => 24,

            ],
            [
                'task_id' => 9,
                'city_id' => 25,

            ],
            [
                'task_id' => 10,
                'city_id' => 29,

            ],
            [
                'task_id' => 10,
                'city_id' => 30,

            ],
            [
                'task_id' => 10,
                'city_id' => 31,

            ],


        ];
        foreach ($data as $datum) {
            TaskCity::create($datum);
        }
    }
}
