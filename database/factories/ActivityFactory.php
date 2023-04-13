<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'percentage' => fake()->numberBetween(0, 100),
            'name' => fake()->name(20),
            'end_date' => fake()->date
        ];
    }
}
