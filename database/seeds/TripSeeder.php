<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
            'title' => 'Lumbini Visit',
            'vehicleType_id' => '1',
            'route_id' => '1',
            'available_seats' => '20',
            'allocated_seats' => '10',

        ]);
        DB::table('trips')->insert([
            'title' => 'Pokhara Visit',
            'vehicleType_id' => '2',
            'route_id' => '2',
            'available_seats' => '20',
            'allocated_seats' => '10',
        ]);


    }
}
