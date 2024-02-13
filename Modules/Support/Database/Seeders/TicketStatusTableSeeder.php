<?php

namespace Modules\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Entities\TicketStatus;

class TicketStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name'=>'Pending',
                'icon'=>'tag',
                'color' => 'warning',


            ],
            [
                'name'=>'UnderVerification',
                'icon'=>'ui-04',
                'color' => 'primary',


            ],
            [
                'name'=>'AdminAnswered',
                'icon'=>'chat-round',
                'color' => 'info',


            ],
            [
                'name'=>'EmployerAnswered',
                'icon'=>'chat-round',
                'color' => 'dark',


            ],
            [
                'name'=>'WorkerAnswered',
                'icon'=>'chat-round',
                'color' => 'dark',


            ],
            [
                'name'=>'Done',
                'icon'=>'check-bold',
                'color' => 'success',


            ],


        ];
        foreach ($statuses as $status){
            TicketStatus::create($status);
        }
    }
}
