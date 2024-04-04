<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\Inventory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(10)->create();
        // Customer::factory(5)->create();
        // Order::factory(5)->create();
        // Sale::factory(5)->create();
        //  Saledetail::factory(5)->create();
        // Inventory::factory(5)->create();
        
        // \App\Models\User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
