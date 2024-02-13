<?php

namespace Modules\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Entities\EmployerTicket;
use Modules\Support\Entities\EmployerTicketStatuses;

class EmployerTicketTableSeeder extends Seeder
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
                'ticket_number' => 'Tik-230356S3B',
                'employer_id' => 1,
                'support_section_id' => 2,
                'subject' => 'شكوى للتعامل غير الجيد',
                'description' => 'إنالقائمون على هذا العمل غير منصفون ولذلك ﻷانهم يقومون ببعض الأعمال الغير قانوينة منثل تطبيق رسوم إضافةيعلى مختلف السلع وذلك نتيجوة للحرب الروسية الأوكرانية التي شنتها روسيا مطلع عام 2022 على شمال أوكرانا والتي دفعت الكثر من الناس للهجرو',

            ],
            [
                'ticket_number' => 'Tik-2302402Ne',
                'employer_id' => 2,
                'support_section_id' => 3,
                'subject' => 'second ticket subject',
                'description' => 'second ticket description',

            ],

        ];


        foreach ($tickets as $ticket){
            EmployerTicket::create($ticket);
        }

        $ticket_statuses = [
            [
                'employer_ticket_id'=>1,
                'ticket_status_id'=>1,
                'created_at' => '2023-02-28 04:13:00',
                'updated_at' => '2023-02-28 04:13:00',
            ],
            [
                'employer_ticket_id'=>1,
                'ticket_status_id'=>2,
                'created_at' => '2023-03-01 01:15:00',
                'updated_at' => '2023-03-01 01:15:00',
            ],
            [
                'employer_ticket_id'=>2,
                'ticket_status_id'=>1,
                'created_at' => '2023-03-02 04:13:00',
                'updated_at' => '2023-03-02 04:13:00',
            ],
        ];
        foreach ($ticket_statuses as $ticket_status){
            EmployerTicketStatuses::create($ticket_status);
        }
    }
}
