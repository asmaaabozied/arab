<?php

namespace Modules\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Entities\WorkerTicket;
use Modules\Support\Entities\WorkerTicketStatuses;

class WorkerTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = [
            [
                'ticket_number' => 'Tik-230445Sa2',
                'worker_id' => 1,
                'support_section_id' => 2,
                'subject' => 'شكوى لمشكلة فنية في قسم المهام',
                'description' => 'إن قسم تصفح المهام يوجد فيه مشكلة وهي عدم معرفتي بالمهام التي قمت بالتقدم بطلب لها دون الدخول إليها',

            ],
            [
                'ticket_number' => 'Tik-230414Q2x',
                'worker_id' => 2,
                'support_section_id' => 1,
                'subject' => 'شكوى في مسألة حساب الباي بال',
                'description' => 'أنا من لا أستطيع افتتاح حساب باي بال وذلك لظروف غير طبييعية هل تمتلكون أي طريقة للدفع غير باي بال',

            ],

        ];


        foreach ($tickets as $ticket){
            WorkerTicket::create($ticket);
        }

        $ticket_statuses = [
            [
                'worker_ticket_id'=>1,
                'ticket_status_id'=>1,
                'created_at' => '2023-03-02 05:15:00',
                'updated_at' => '2023-03-02 04:15:00',
            ],
            [
                'worker_ticket_id'=>1,
                'ticket_status_id'=>2,
                'created_at' => '2023-03-03 01:15:00',
                'updated_at' => '2023-03-03 01:15:00',
            ],
            [
                'worker_ticket_id'=>2,
                'ticket_status_id'=>1,
                'created_at' => '2023-03-06 04:17:00',
                'updated_at' => '2023-03-06 04:17:00',
            ],
        ];
        foreach ($ticket_statuses as $ticket_status){
            WorkerTicketStatuses::create($ticket_status);
        }
    }
}
