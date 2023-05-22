<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $buyerId = $faker->randomElement($users);
            $sellerId = $faker->randomElement($users);
            $productId = $faker->randomElement($products);
            $finalPrice = $faker->numberBetween(100, 1000);
            $status = $faker->randomElement(['completed', 'pending', 'cancelled']);

            DB::table('transactions')->insert([
                'buyer_id' => $buyerId,
                'seller_id' => $sellerId,
                'product_id' => $productId,
                'final_price' => $finalPrice,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
