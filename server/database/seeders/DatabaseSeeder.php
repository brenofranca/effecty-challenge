<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Licitation;
use App\Models\LicitationCandidate;
use App\Models\LicitationDocument;
use App\Models\LicitationResponsible;
use App\Models\LicitationResult;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory(1)->create([
            'name' => 'Admin User',
            'email' => 'admin@effecty.com',
            'password' => 'secret'
        ]);

        $company = Company::factory(1)->create([
            'user_id' => $user->first()->id
        ])->first();

        $companies = Company::factory(50)->create();

        Licitation::factory(400)->create()->each(function ($licitation) use ($companies, $company) {
            $winnerId = $companies->random()->id;

            if ($licitation->status === 'Finalizada') {
                $licitation->update([
                    'winner_id' => $winnerId
                ]);

                LicitationResult::factory(1)->create([
                    'licitation_id' => $licitation->id,
                ]);

                LicitationDocument::factory(2)->create([
                    'licitation_id' => $licitation->id
                ]);

                LicitationCandidate::factory(1)->create([
                    'company_id' => $winnerId,
                    'licitation_id' => $licitation->id
                ]);
            }
            
            LicitationResponsible::factory(2)->create([
                'licitation_id' => $licitation->id
            ]);

            LicitationCandidate::factory(1)->create([
                'company_id' => $company->id,
                'licitation_id' => $licitation->id,
            ]);

            LicitationCandidate::factory(rand(3, 10))->make()->each(function ($item) use ($licitation, $companies) {
                $item->company_id = $companies->random()->id;
                $item->licitation_id = $licitation->id;

                $item->save();
            });

            LicitationCandidate::factory(1)->make()->each(function ($item) use ($licitation, $companies) {
                $item->company_id = $companies->random()->id;
                $item->licitation_id = $licitation->id;

                $item->save();
            });
        });
    }
}
