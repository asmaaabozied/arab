<?php

namespace Modules\Employer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Employer\Entities\Employer;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = [
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM1',
                'name' => 'Maytham Mohammad',
                'email' => 'Maytham@yahoo.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 1,
                'city_id' => 1,
                'phone' => '00963256410',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Maytham Description',
                'address' => 'Syria, Aleppo',
                'zip_code' => '5415',
                'status' => 'enable',
                'wallet_balance' => 65.00,
                'total_spends' => 10.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM2',
                'name' => 'Maya Othman',
                'email' => 'Maya@yahoo.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 2,
                'city_id' => 4,
                'phone' => '0025143256410',
                'employer_level_id' => 1,
                'gender' => 'female',
                'description' => 'Maya Description',
                'address' => 'Egypt, Qayro',
                'zip_code' => '5876',
                'status' => 'enable',
                'wallet_balance' => 98.00,
                'total_spends' => 56.00,


            ],

            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM3',
                'name' => 'Isabelle Cote',
                'email' => 'poulin.yvan@hotmail.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 3,
                'city_id' => 7,
                'phone' => '2221226901338541',
                'employer_level_id' => 1,
                'gender' => 'female',
                'description' => 'Isabelle Description',
                'address' => '40 Route Savard Apt. 612, St-Lucas, QC L1X 2V3',
                'zip_code' => '54',
                'status' => 'enable',
                'wallet_balance' => 984.00,
                'total_spends' => 0.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM4',
                'name' => 'Zoe Scott',
                'email' => 'mathilde70@hotmail.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 4,
                'city_id' => 10,
                'phone' => '931-367-4320',
                'employer_level_id' => 1,
                'gender' => 'female',
                'description' => 'Zoe Scott (Female)',
                'address' => '95 Chemin Auguste Bureau 967, Saint-Alexandre-sur-Rivière-du-Sud, QC F6H4P9',
                'zip_code' => '655tg',
                'status' => 'enable',
                'wallet_balance' => 122.00,
                'total_spends' => 5.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM5',
                'name' => 'Isabella Fortin',
                'email' => 'mathieu.mercier@perron.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 5,
                'city_id' => 12,
                'phone' => '1-619-634-9067',
                'employer_level_id' => 1,
                'gender' => 'female',
                'description' => 'Zoe Scott (Female)',
                'address' => '5 Avenue Élodie, Sainte-Roland, AB X1Z7T2',
                'zip_code' => '54vv',
                'status' => 'enable',
                'wallet_balance' => 665.00,
                'total_spends' => 77.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM6',
                'name' => 'Grayson Kelly',
                'email' => 'jeannine16@yahoo.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 6,
                'city_id' => 15,
                'phone' => '774435654651138',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Grayson Kelly (Male)',
                'address' => '59 Autoroute Demers Bureau 022, Sainte-David, SK K6S3E3',
                'zip_code' => 'dfg54',
                'status' => 'enable',
                'wallet_balance' => 58.00,
                'total_spends' => 2.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM7',
                'name' => 'Sebastian Mitchell',
                'email' => 'lambert.anouk@arsenault.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 7,
                'city_id' => 19,
                'phone' => '77445845751138',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Sebastian Mitchell (Male)',
                'address' => '015 Route Bouchard Bureau 793, Ste-Frédéric, AB R1S3A4',
                'zip_code' => 'dfg54',
                'status' => 'enable',
                'wallet_balance' => 55.00,
                'total_spends' => 0.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM8',
                'name' => 'Colton Williams',
                'email' => 'qpelletier@yahoo.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 8,
                'city_id' => 22,
                'phone' => '(603)474-5872',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Colton Williams (Male)',
                'address' => '34 Chemin Dufour, Sainte-Nancy, BC M5F5Y3',
                'zip_code' => 'fd452',
                'status' => 'enable',
                'wallet_balance' => 98.00,
                'total_spends' => 9.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM9',
                'name' => 'Levi Johnston',
                'email' => 'nadeau.corrine@savard.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 9,
                'city_id' => 25,
                'phone' => '210.181.63.27',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Levi Johnston (Male)',
                'address' => '7 Autoroute Bouchard, St-Alfred-de-Rioux, BC F8Z0E7',
                'zip_code' => 'mj45',
                'status' => 'enable',
                'wallet_balance' => 22.00,
                'total_spends' => 0.00,


            ],
            [
                'employer_number' => 'E-Y-M-S-RCH-RNUM10',
                'name' => 'Aiden Reid',
                'email' => 'vgingras@fontaine.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'country_id' => 10,
                'city_id' => 30,
                'phone' => '1-602-637-6923',
                'employer_level_id' => 1,
                'gender' => 'male',
                'description' => 'Aiden Reid (Male)',
                'address' => '882 Pont Sébastien, St-Susanne, NL D9L3Y1',
                'zip_code' => 'mj3s',
                'status' => 'enable',
                'wallet_balance' => 223.00,
                'total_spends' => 0.00,


            ],

        ];
        foreach ($employers as $employer) {
            Employer::create($employer);
        }
    }
}
