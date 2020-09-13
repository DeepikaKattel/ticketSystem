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
            'vehicleType' => 'Deluxe',
            'route' => 'Pokhara - Lumbini',

        ]);
        DB::table('trips')->insert([
            'title' => 'Pokhara Visit',
            'vehicleType' => 'AC Deluxe',
            'route' => 'Lumbini - Pokhara',
        ]);


    }
}
