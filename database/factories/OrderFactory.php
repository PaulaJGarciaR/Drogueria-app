<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeThisDecade(),
            'product_id' => \App\Models\Product::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'total_amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
