<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Home & Garden'],
            ['name' => 'Sports'],
            ['name' => 'accessories'],
            ['name' => 'Televisions'],
            ['name' => 'sunglass'],
            ['name' => 'watch'],
            ['name' => 'Home Audio & Theater'],
            ['name' => 'Computers & Tablets'],
            ['name' => 'Books'],
            // Add more categories as needed
        ];

        DB::table('categories')->insert($categories);
    }
}
