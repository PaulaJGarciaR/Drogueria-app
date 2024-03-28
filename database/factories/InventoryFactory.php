<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
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
            'product_category' => $this->faker->word(),
            'price_sale' => $this->faker->randomFloat(2, 0, 1000), 
            'quantity_in_stock' => $this->faker->randomNumber(2),
            'expiration_date' => $this->faker->dateTimeThisDecade(),
            'supplier' => $this->faker->name,
        ];
    }
}
