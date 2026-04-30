<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve_Service;

class Reserve_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserve_Service::factory(30)->create();
    }
}
