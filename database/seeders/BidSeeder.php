<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();

        foreach ($products as $productId) {
            $bidCount = $faker->numberBetween(0, 5);

            for ($i = 0; $i < $bidCount; $i++) {
                $userId = $faker->randomElement($users);
                $price = $faker->numberBetween(100, 1000);

                DB::table('bids')->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'price' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
