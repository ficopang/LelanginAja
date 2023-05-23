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
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'phoneNumber' => $faker->phoneNumber,
                'courier' => $courier,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'province' => $faker->state,
                'postal_code' => $faker->postcode,
                'cost' => $shippingCost,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
