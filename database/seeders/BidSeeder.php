<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bids = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'price' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'price' => 600,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'product_id' => 2,
                'price' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more user bids as needed
        ];

        DB::table('bids')->insert($bids);
    }
}
