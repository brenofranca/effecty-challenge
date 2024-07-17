<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LicitationDocumentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->numerify(),
            'file_url' => fake()->imageUrl(640, 480, 'animals', true),
            'file_name' => fake()->uuid() . '.png',
        ];
    }
}
