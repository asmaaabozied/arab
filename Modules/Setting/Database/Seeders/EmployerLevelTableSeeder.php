<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\EmployerLevel;

class EmployerLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name' => 'New',
                'minimum_spend' => '0',
                'minimum_task' => '0',

            ],
            [
                'name' => 'medium',
                'minimum_spend' => '600',
                'minimum_task' => '3',

            ],
            [
                'name' => 'ManyRequests',
                'minimum_spend' => '1200',
                'minimum_task' => '10',
            ],

        ];
        foreach ($levels as $level){
            EmployerLevel::create($level);
        }
    }
}
