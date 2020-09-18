<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_type')->insert([
            'name' => 'Deluxe',
            'layout' => '2-2',
            'Seat_Row' => '5',
            'Seat_Column' => '4',
            'facility_id' => '1',
        ]);
        DB::table('vehicle_type')->insert([
            'name' => 'AC Deluxe',
            'layout' => '2-2',
            'Seat_Row' => '5',
            'Seat_Column' => '4',
            'facility_id' => '2',
        ]);

    }
}
