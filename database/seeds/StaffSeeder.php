<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'name' => 'Bivisha Karki',
            'position' => 'Driver',
            'phoneNumber' => '9812312511',
            'address' => 'Baneshwor',
        ]);
        DB::table('staff')->insert([
            'name' => 'Ram Shrestha',
            'position' => 'Driver',
            'phoneNumber' => '9812312514',
            'address' => 'Bhaktapur',

        ]);
    }
}
