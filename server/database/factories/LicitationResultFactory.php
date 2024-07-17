<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LicitationResultFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value_estimated' => fake()->randomFloat(2),
            'value_contracted' => fake()->randomFloat(2),
            'value_economized' => fake()->randomFloat(2),
        ];
    }
}
