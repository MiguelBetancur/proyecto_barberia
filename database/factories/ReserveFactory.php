<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'state' => $this->faker->randomElement([
                'Cancelada',
                'Completada',
                'Pendiente'
            ]),
            'date' => $this->faker->date(),
            'time' => $this->faker->time('H:i'),
            'user_id' =>\App\Models\User::inRandomOrder()->first()->id
        ];
    }
}
