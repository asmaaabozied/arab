<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskStatus;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_statuses = [
            [
                'task_id' => 1,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:13:00',
                'updated_at' => '2023-01-05 02:13:00',


            ],
            [
                'task_id' => 1,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 02:15:08',
                'updated_at' => '2023-01-05 02:15:08',


            ],
            [
                'task_id' => 2,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:16:08',
                'updated_at' =>  '2023-01-05 02:16:08',


            ],
            [
                'task_id' => 2,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 02:18:08',
                'updated_at' => '2023-01-05 02:18:08',


            ],

            [
                'task_id' => 3,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:20:08',
                'updated_at' => '2023-01-05 02:20:08',


            ],
            [
                'task_id' => 3,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 02:26:08',
                'updated_at' => '2023-01-05 02:26:08',


            ],


            [
                'task_id' => 4,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:44:08',
                'updated_at' => '2023-01-05 02:44:08',


            ],


            [
                'task_id' => 5,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:55:08',
                'updated_at' => '2023-01-05 02:55:08',


            ],
            [
                'task_id' => 5,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 02:56:08',
                'updated_at' => '2023-01-05 02:56:08',


            ],
            [
                'task_id' => 6,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 02:39:08',
                'updated_at' => '2023-01-05 02:39:08',


            ],
            [
                'task_id' => 7,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 06:16:08',
                'updated_at' => '2023-01-05 06:16:08',


            ],
            [
                'task_id' => 8,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 08:13:08',
                'updated_at' => '2023-01-05 08:13:08',


            ],
            [
                'task_id' => 9,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 09:13:08',
                'updated_at' => '2023-01-05 09:13:08',


            ],
            [
                'task_id' => 9,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 09:50:08',
                'updated_at' => '2023-01-05 09:50:08',


            ],
            [
                'task_id' => 10,
                'task_status_id' => 2,
                'created_at' => '2023-01-05 10:10:08',
                'updated_at' => '2023-01-05 10:10:08',


            ],
            [
                'task_id' => 10,
                'task_status_id' => 3,
                'created_at' => '2023-01-05 10:20:08',
                'updated_at' => '2023-01-05 10:20:08',


            ],


        ];
        foreach ($task_statuses as $task_status) {
            TaskStatus::create($task_status);
        }
    }
}
