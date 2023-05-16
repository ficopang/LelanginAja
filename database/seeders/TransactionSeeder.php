<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'buyer_id' => 1,
                'seller_id' => 2,
                'product_id' => 1,
                'final_price' => 1000,
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'buyer_id' => 2,
                'seller_id' => 1,
                'product_id' => 2,
                'final_price' => 1500,
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more transactions as needed
        ];

        DB::table('transactions')->insert($transactions);
    }
}
