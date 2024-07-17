<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class LicitationFactory extends Factory
{
    public function definition(): array
    {
        $statusArray = [
            'Publicada',
            'Recebendo propostas',
            'Esperando Realização',
            'Em Realização',
            'Fracassada',
            'Anulada',
            'Suspensa',
            'Finalizada',
        ];

        $status = array_rand(array_flip($statusArray), 1);
        
        return [
            'number' => fake()->isbn13(),
            'department' => fake()->catchPhrase(),
            'status' => $status,
            'objective' => fake()->text(100),
            'form_acquisition' => fake()->text(100),
            'date_published' => fake()->dateTimeBetween('-6 month', '+1 week'),
        ];
    }
}
