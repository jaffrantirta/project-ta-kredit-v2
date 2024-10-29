<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nik' => $this->faker->numerify('##########'),
            'phone' => $this->faker->phoneNumber,
            'birthday' => $this->faker->date(),
            'birthplace' => $this->faker->city,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'other_address' => $this->faker->address,
            'occupation' => $this->faker->jobTitle(),
        ];
    }
}
