<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Reserve_ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reserve_id' =>\App\Models\Reserve::inRandomOrder()->first()->id,
            'service_id' =>\App\Models\Service::inRandomOrder()->first()->id,
        ];
    }
}
