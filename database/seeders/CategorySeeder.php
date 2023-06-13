<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $categories = [
        //     ['name' => 'Electronics'],
        //     ['name' => 'Fashion'],
        //     ['name' => 'Home & Garden'],
        //     ['name' => 'Sports'],
        //     ['name' => 'Accessories'],
        //     ['name' => 'Televisions'],
        //     ['name' => 'Sunglass'],
        //     ['name' => 'Watch'],
        //     ['name' => 'Home Audio & Theater'],
        //     ['name' => 'Computers & Tablets'],
        //     ['name' => 'Books'],
        //     // Add more categories as needed
        // ];

        $categories = [
            ['name' => 'televisions'],
            ['name' => 'mobile_phones'],
            ['name' => 'laptops'],
            ['name' => 'cameras'],
            // ['name' => 'mens_clothing'],
            // ['name' => 'womens_clothing'],
            // ['name' => 'jewelry'],
            // ['name' => 'watches'],
        ];

        DB::table('categories')->insert($categories);
    }
}