<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = \App\Models\Company::class;

    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(),
            'street_address' => $this->faker->address(),
            'representative_name' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}