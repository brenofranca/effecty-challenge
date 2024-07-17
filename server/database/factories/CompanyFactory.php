<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'cnpj' => fake()->ipv4(),
            'type' => array_rand(array_flip(['produto', 'serviço']), 1),
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'value_posted' => fake()->randomFloat(2, 1000, 100000),
            'date_posted' => fake()->dateTimeBetween('-5 month')
        ];
    }
}
