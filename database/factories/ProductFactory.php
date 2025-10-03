<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(2, true)), // bijv. "Laser Keyboard"
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['beschikbaar', 'onbeschikbaar', 'kapot']),
            'last_used' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
