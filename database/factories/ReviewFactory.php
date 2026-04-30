<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' =>$this->faker->text(30),
            'rating' => $this->faker->numberBetween(1, 10),
            'user_id' =>\App\Models\User::inRandomOrder()->first()->id
        ];
    }
}
