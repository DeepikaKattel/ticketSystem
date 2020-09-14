<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'name' => 'Shakira Travels',
            'phoneNumber' => '9812312451',
        ]);
        DB::table('agents')->insert([
            'name' => 'Koshi Travels',
            'phoneNumber' => '9812312532',


        ]);
    }
}
