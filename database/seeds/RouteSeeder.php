<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([

            'start_point' => 'Lumbini',
            'end_point' => 'Pokhara',
            'name' => 'Lumbini - Pokhara',
            'stoppage_points' => 'Pokhara',
            'distance' => '15 Hours',
            'child_seat' => 'Yes',
            'special_seat' => 'Yes',

        ]);
        DB::table('routes')->insert([
            'start_point' => 'Pokhara',
            'end_point' => 'Lumbini',
            'name' => 'Pokhara - Lumbini',
            'stoppage_points' => 'Pokhara',
            'distance' => '15 Hours',
            'child_seat' => 'Yes',
            'special_seat' => 'Yes',
        ]);


    }
}
