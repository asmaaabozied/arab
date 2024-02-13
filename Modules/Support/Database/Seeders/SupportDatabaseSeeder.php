<?php

namespace Modules\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SupportDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SupportSectionTableSeeder::class);
        $this->call(TicketStatusTableSeeder::class);


//         todo local must be uncomment
//         $this->call(EmployerTicketTableSeeder::class);
//         $this->call(WorkerTicketTableSeeder::class);
    }
}
