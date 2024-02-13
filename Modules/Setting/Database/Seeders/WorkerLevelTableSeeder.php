<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\WorkerLevel;

class WorkerLevelTableSeeder extends Seeder
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
                'minimum_approved_proof' => '0',

            ],
            [
                'name' => 'Bronze',
                'minimum_approved_proof' => '30',

            ],
            [
                'name' => 'Silver',
                'minimum_approved_proof' => '50',

            ],
            [
                'name' => 'Golden',
                'minimum_approved_proof' => '70',

            ],


        ];
        foreach ($levels as $level){
            WorkerLevel::create($level);
        }
    }
}
