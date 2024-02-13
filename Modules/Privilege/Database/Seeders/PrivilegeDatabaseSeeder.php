<?php

namespace Modules\Privilege\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Privilege\Entities\Privilege;

class PrivilegeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privileges = [
            [
                'title' => 'Create New Task',
                'code' => 'CNT',
                'privileges' => '5',
                'type' => 'plus',
                'for' => 'employer',
            ],
            [
                'title' => 'Charge Wallet Balance',
                'code' => 'CWB',
                'privileges' => '3',
                'type' => 'plus',
                'for' => 'employer',
            ],
            [
                'title' => 'Use Additional Feature',
                'code' => 'UAF',
                'privileges' => '2',
                'type' => 'plus',
                'for' => 'employer',
            ],
            [
                'title' => 'Having A Dual Account',
                'code' => 'HDA',
                'privileges' => '4',
                'type' => 'plus',
                'for' => 'dual',
            ],
            [
                'title' => 'SingUp To ArabWorkers',
                'code' => 'STA',
                'privileges' => '10',
                'type' => 'plus',
                'for' => 'dual',
            ],
            [
                'title' => 'Accept Task Proof',
                'code' => 'ATF',
                'privileges' => '3',
                'type' => 'plus',
                'for' => 'worker',
            ],
            [
                'title' => 'Reject Task Proof',
                'code' => 'RTF',
                'privileges' => '5',
                'type' => 'minus',
                'for' => 'worker',
            ],
            [
                'title' => 'Suspend Activity In Platform',
                'code' => 'SAP',
                'privileges' => '8',
                'type' => 'minus',
                'for' => 'dual',
            ],


        ];
        foreach ($privileges as $privilege) {
            Privilege::create($privilege);
        }
    }
}
