<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'method' => $this->faker->randomElement([
                'Efectivo',
                'Tarjeta',
                'Transferencia'
            ]),
            'amount' => $this->faker->numberBetween(20000, 40000), 
            'reserve_id' =>\App\Models\Reserve::inRandomOrder()->first()->id
        ];
    }
}
