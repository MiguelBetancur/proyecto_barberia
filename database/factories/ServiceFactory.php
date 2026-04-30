<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    return [
        'name' => $this->faker->word(),
        'price' => $this->faker->numberBetween(20000, 40000),
        'duration' => $this->faker->numberBetween(30, 60),
    ];
}
}
