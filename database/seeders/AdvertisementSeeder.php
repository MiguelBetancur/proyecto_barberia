<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertisement;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertisement::factory(30)->create();
    }
}
