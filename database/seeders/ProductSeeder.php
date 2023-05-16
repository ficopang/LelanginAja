<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'name' => 'Product 1',
                'description' => 'Description of Product 1',
                'starting_price' => 100,
                'min_bid_increment' => 10,
                'image_url' => 'https://example.com/product1.jpg',
                'start_time' => now(),
                'end_time' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'name' => 'Product 2',
                'description' => 'Description of Product 2',
                'starting_price' => 200,
                'min_bid_increment' => 20,
                'image_url' => 'https://example.com/product2.jpg',
                'start_time' => now(),
                'end_time' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more products as needed
        ];

        DB::table('products')->insert($products);
    }
}
