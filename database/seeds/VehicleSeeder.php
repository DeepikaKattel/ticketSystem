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
            'vehicleType' => 'Deluxe',
            'engine' => '202',
            'chassis' => '032',
            'model' => '2005',
            'owner_name' => 'Ram Dhakal',
            'owner_number' => '9800231223',
            'brand_name' => 'Tata',
        ]);
        DB::table('vehicles')->insert([
            'reg_number' => '00233',
            'vehicleType' => 'AC Deluxe',
            'engine' => '204',
            'chassis' => '035',
            'model' => '2007',
            'owner_name' => 'Ram Shrestha',
            'owner_number' => '9800231229',
            'brand_name' => 'Maruti',
        ]);
        DB::table('routes')->insert([

            'name' => 'Lumbini - Pokhara',
            'start_point' => 'Lumbini',
            'end_point' => 'Pokhara',
            'stoppage_points' => 'Pokhara',
            'distance' => '15 Hours',
            'child_seat' => 'Yes',
            'special_seat' => 'Yes',

        ]);
        DB::table('routes')->insert([
            'name' => 'Pokhara - Lumbini',
            'start_point' => 'Pokhara',
            'end_point' => 'Lumbini',
            'stoppage_points' => 'Pokhara',
            'distance' => '15 Hours',
            'child_seat' => 'Yes',
            'special_seat' => 'Yes',
        ]);
    }
}
