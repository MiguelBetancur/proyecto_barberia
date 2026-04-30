<?php

namespace Database\Seeders;

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
        $this ->call([RoleSeeder::class, UserSeeder::class, ServiceSeeder::class, ReserveSeeder::class, Reserve_ServiceSeeder::class, PaymentSeeder::class, ReviewSeeder::class, AdvertisementSeeder::class,]);
    }
}
