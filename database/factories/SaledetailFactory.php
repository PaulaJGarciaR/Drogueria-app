<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saledetail>
 */
class SaledetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'quantity' => $this->faker->randomNumber(2),
            'price_sale' => $this->faker->randomFloat(2, 0, 1000),
            'sale_id' => \App\Models\Sale::factory(),
        ];
    }
}
