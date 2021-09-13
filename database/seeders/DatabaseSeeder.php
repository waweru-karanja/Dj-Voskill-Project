<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Bookingstatus;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\Userseeder;
use Database\Seeders\BookingsSeeder;
use Database\Seeders\BookingstatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            Userseeder::class,
        ]);
        \App\Models\Role::factory()->hasUsers(10)->create();
        
        $this->call([
            BookingsSeeder::class,
            BookingstatusSeeder::class,
        ]);
        \App\Models\Bookingstatus::factory()->hasbookings(10)->create();

        
    }
}
