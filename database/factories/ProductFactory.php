<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();
        $ecommerce = new Ecommerce($faker);

        $categoryNames = [
            'televisions',
            'mobilePhones',
            'laptops',
            'cameras',
            'mensClothing',
            'womensClothing',
            'jewelry',
            'watches',
        ];

        $categoryMap = [
            'televisions' => $ecommerce->televisions(),
            'mobilePhones' => $ecommerce->mobilePhones(),
            'laptops' => $ecommerce->laptops(),
            'cameras' => $ecommerce->cameras(),
            'mensClothing' => $ecommerce->mensClothing(),
            'womensClothing' => $ecommerce->womensClothing(),
            'jewelry' => $ecommerce->jewelry(),
            'watches' => $ecommerce->watches(),
        ];
        $category = $faker->randomElement($categoryNames);
        $imagePath = "public/{$category}";
        $imageFiles = Storage::files($imagePath);
        $imageUrl = Storage::url($faker->randomElement($imageFiles));

        return [
            'user_id' => $faker->randomElement($users),
            'category_id' => $faker->randomElement($categories),
            'name' => $categoryMap[$category],
            'description' => $faker->paragraph,
            'starting_price' => $faker->numberBetween(10000, 1000000),
            'min_bid_increment' => $faker->numberBetween(1000, 100000),
            'image_url' => $imageUrl,
            'start_time' => $faker->dateTimeBetween('now', '+1 week'),
            'end_time' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
