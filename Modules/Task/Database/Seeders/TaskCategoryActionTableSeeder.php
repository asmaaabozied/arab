<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskCategoryAction;

class TaskCategoryActionTableSeeder extends Seeder
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
                'category_action_id' => 1,

            ],
            [
                'task_id' => 1,
                'category_action_id' => 2,

            ],
            [
                'task_id' => 1,
                'category_action_id' => 3,

            ],

            [
                'task_id' => 2,
                'category_action_id' => 5,

            ],
            [
                'task_id' => 2,
                'category_action_id' => 6,

            ],

            [
                'task_id' => 3,
                'category_action_id' => 8,

            ],
            [
                'task_id' => 3,
                'category_action_id' => 9,

            ],

            [
                'task_id' => 4,
                'category_action_id' => 12,

            ],

            [
                'task_id' => 5,
                'category_action_id' => 14,

            ],
            [
                'task_id' => 5,
                'category_action_id' => 15,

            ],

            [
                'task_id' => 6,
                'category_action_id' => 16,

            ],
            [
                'task_id' => 7,
                'category_action_id' => 17,

            ],
            [
                'task_id' => 7,
                'category_action_id' => 19,

            ],
            [
                'task_id' => 8,
                'category_action_id' => 20,

            ],
            [
                'task_id' => 8,
                'category_action_id' => 21,

            ],
            [
                'task_id' => 8,
                'category_action_id' => 22,

            ],
            [
                'task_id' => 8,
                'category_action_id' => 23,

            ],
            [
                'task_id' =>9,
                'category_action_id' => 24,

            ],
            [
                'task_id' =>9,
                'category_action_id' => 25,

            ],
            [
                'task_id' =>10,
                'category_action_id' => 28,

            ],
            [
                'task_id' =>10,
                'category_action_id' => 29,

            ],
            [
                'task_id' =>10,
                'category_action_id' => 30,

            ],
            [
                'task_id' =>10,
                'category_action_id' => 32,

            ],

        ];
        foreach ($data as $datum){
            TaskCategoryAction::create($datum);
        }
    }
}
