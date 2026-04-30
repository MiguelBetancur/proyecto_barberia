<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Service::factory()->create([
            'name' => 'Corte clasico',
            'price' => 25000,
            'duration' => 30
        ]);

        Service::factory()->create([
            'name' => 'Fade',
            'price' => 30000,
            'duration' => 45
        ]);

        Service::factory()->create([
            'name' => 'Barba',
            'price' => 20000,
            'duration' => 30
        ]);

        Service::factory()->create([
            'name' => 'Afeitado',
            'price' => 22000,
            'duration' => 35
        ]);
    }
}
