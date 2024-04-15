<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_payment' => $this->faker->randomFloat(2, 0, 1000),
            'date_of_sale' => $this->faker->dateTimeThisDecade(),
            'customer_id' => \App\Models\Customer::factory(),
        ];
    }
}