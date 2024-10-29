<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanWeight>
 */
class LoanWeightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_id' => \App\Models\Loan::factory()->create()->id,
            'criteria_id' => \App\Models\Criteria::factory()->create()->id,
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
