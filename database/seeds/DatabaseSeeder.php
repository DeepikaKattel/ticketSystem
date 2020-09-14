<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(AgentSeeder::class);

    }
}
