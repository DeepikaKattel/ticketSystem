<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'email' => 'admin@jhunTravels.com',
            'password' => bcrypt('1234'),
            'phoneNumber' => '98234567',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);

    }
}
