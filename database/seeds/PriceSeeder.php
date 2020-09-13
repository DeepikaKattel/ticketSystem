<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            'route' => 'Lumbini - Pokhara',
            'vehicleType' => 'Deluxe',
            'price' => '1500',
            'children_price' => '600',
            'special_price' => '700',

        ]);
        DB::table('prices')->insert([
            'route' => 'Pokhara - Lumbini',
            'vehicleType' => 'AC Deluxe',
            'price' => '1600',
            'children_price' => '700',
            'special_price' => '800',
        ]);
    }
}
