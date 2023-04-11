<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'names' => fake()->firstName,
            'last_names' => fake()->lastName,
            'document' => strval(fake()->unique()->numberBetween(1000000, 9999999)),
        ];
    }
}
