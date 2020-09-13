<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'name' => 'Wifi',
            'services' => '24 Hour wifi Service',
        ]);
        DB::table('facilities')->insert([
            'name' => 'Water',
            'services' => '2 bottles of water per person',

        ]);


    }
}
