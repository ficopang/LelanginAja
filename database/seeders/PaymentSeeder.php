<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'transaction_id' => 1,
                'payment_method' => 'Credit Card',
                'amount' => 1000,
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 2,
                'payment_method' => 'PayPal',
                'amount' => 1500,
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more payments as needed
        ];

        DB::table('payments')->insert($payments);
    }
}
