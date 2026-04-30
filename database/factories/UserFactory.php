<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

        protected static ?string $password;

    public function definition()
    {
       return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'), 
        'role_id' => $this->faker->randomElement([1, 2, 3]), //Como no existe Factory de Role, se debe randomiuzar el role
        'remember_token' => Str::random(10),
    ];
    }
}
