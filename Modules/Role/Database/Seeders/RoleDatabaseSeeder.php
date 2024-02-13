<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Role\Entities\Role;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'GeneralManager',
                'routes' => 'all',

            ],
            [
                'name' => 'FinancialManager',
                'routes' => 'home|changePassword|Pay',

            ],
            [
                'name' => 'TaskManager',
                'routes' => 'tasks|createTask|RemoveTask',

            ],
            [
                'name' => 'SupportManager',
                'routes' => 'support|addAnswer|RemoveAnswer|Tickets',

            ],

        ];
        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
