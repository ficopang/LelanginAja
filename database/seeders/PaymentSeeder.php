<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $transactions = DB::table('transactions')->pluck('id')->toArray();

        $paymentMethods = ['Credit Card', 'PayPal', 'Bank Transfer'];

        foreach ($transactions as $transactionId) {
            $amount = $faker->numberBetween(100, 1000);
            $status = $faker->randomElement(['paid', 'pending', 'failed']);
            $paymentMethod = $faker->randomElement($paymentMethods);

            DB::table('payments')->insert([
                'transaction_id' => $transactionId,
                'payment_method' => $paymentMethod,
                'amount' => $amount,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
