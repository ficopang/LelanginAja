<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // $users = DB::table('users')->pluck('id')->toArray();
        // $categories = DB::table('categories')->pluck('id')->toArray();

        // for ($i = 0; $i < 20; $i++) {
        //     DB::table('products')->insert([
        //         'user_id' => $faker->randomElement($users),
        //         'category_id' => $faker->randomElement($categories),
        //         'name' => $faker->sentence(3),
        //         'description' => $faker->paragraph,
        //         'starting_price' => $faker->numberBetween(10000, 1000000),
        //         'min_bid_increment' => $faker->numberBetween(1000, 100000),
        //         'image_url' => $faker->imageUrl(),
        //         'start_time' => $faker->dateTimeBetween('now', '+1 week'),
        //         'end_time' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        Product::factory()
            ->count(30)
            ->create();
    }
}
