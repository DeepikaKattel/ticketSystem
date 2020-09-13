<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinations')->insert([
            'name' => 'Lumbini',
            'description' => 'A place with history.',
            'image' => '89018692.jpg',
        ]);
        DB::table('destinations')->insert([
            'name' => 'Pokhara',
            'description' => 'A place with beauty.',
            'image' => '89018692.jpg',
        ]);

    }
}
