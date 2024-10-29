<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomNumber(5),
            'duration' => $this->faker->randomNumber(2),
            'purpose' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'customer_id' => \App\Models\Customer::factory()->create()->id,
            'status_id' => \App\Models\Status::factory()->create()->id,
        ];
    }
}
