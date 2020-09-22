<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '2',
            'firstName' => 'Deepika',
            'lastName' => 'Kattel',
            'email' => 'deepika@gmail.com',
            'password' => bcrypt('1234'),
            'phoneNumber' => '98812312',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
    }
}
