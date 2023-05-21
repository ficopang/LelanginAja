<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $transactions = DB::table('transactions')->pluck('id')->toArray();

        $couriers = ['JNE', 'SiCepat', 'AnterAja'];

        foreach ($transactions as $transactionId) {
            $shippingCost = $faker->numberBetween(10, 50);
            $status = $faker->randomElement(['shipped', 'processing', 'delivered']);
            $courier = $faker->randomElement($couriers);

            DB::table('shipments')->insert([
                'transaction_id' => $transactionId,
                'courier' => $courier,
                'shipping_address' => $faker->streetAddress,
                'shipping_city' => $faker->city,
                'shipping_province' => $faker->state,
                'shipping_postal_code' => $faker->postcode,
                'shipping_cost' => $shippingCost,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
