<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'reg_number' => '00234',
            'vehicleType_id' => '1',
            'engine' => '202',
            'chassis' => '032',
            'model' => '2005',
            'owner_name' => 'Ram Dhakal',
            'owner_number' => '9800231223',
            'brand_name' => 'Tata',
        ]);
        DB::table('vehicles')->insert([
            'reg_number' => '00233',
            'vehicleType_id' => '2',
            'engine' => '204',
            'chassis' => '035',
            'model' => '2007',
            'owner_name' => 'Ram Shrestha',
            'owner_number' => '9800231229',
            'brand_name' => 'Maruti',
        ]);

    }
}
