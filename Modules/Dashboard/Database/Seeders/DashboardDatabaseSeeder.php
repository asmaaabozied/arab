<?php

namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DashboardDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }

    //todo live server command


    /**
    php artisan module:migrate Role
    php artisan module:seed Role

    php artisan module:migrate Currency
    php artisan module:seed Currency

    php artisan module:migrate Admin
    php artisan module:seed Admin

    php artisan module:migrate Setting
    php artisan module:seed Setting

    php artisan module:migrate Category
    php artisan module:seed Category

    php artisan module:migrate Region
    php artisan module:seed Region

    php artisan module:migrate Google
    php artisan module:seed Google

    php artisan module:migrate Employer

    php artisan module:migrate Worker

    php artisan module:migrate Privilege
    php artisan module:seed Privilege

    php artisan module:migrate Task


    php artisan module:migrate Transaction

    php artisan module:migrate DiscountCode

    php artisan module:migrate Support
    php artisan module:seed Support

    php artisan module:migrate SwitchAccount
    php artisan module:migrate Mail



     */





//todo localhost  command
    /**
    php artisan module:migrate Role
    php artisan module:seed Role

    php artisan module:migrate Currency
    php artisan module:seed Currency

    php artisan module:migrate Admin
    php artisan module:seed Admin

    php artisan module:migrate Setting
    php artisan module:seed Setting

    php artisan module:migrate Category
    php artisan module:seed Category

    php artisan module:migrate Region
    php artisan module:seed Region

    php artisan module:migrate Google
    php artisan module:seed Google

    php artisan module:migrate Employer
    php artisan module:seed Employer

    php artisan module:migrate Worker
    php artisan module:seed Worker

    php artisan module:migrate Privilege
    php artisan module:seed Privilege

    php artisan module:migrate Task
    php artisan module:seed Task


    php artisan module:migrate Transaction
    php artisan module:seed Transaction

    php artisan module:migrate DiscountCode
    php artisan module:seed DiscountCode

    php artisan module:migrate Support
    php artisan module:seed Support

    php artisan module:migrate SwitchAccount
    php artisan module:seed SwitchAccount

    php artisan module:migrate Mail


     */








}
