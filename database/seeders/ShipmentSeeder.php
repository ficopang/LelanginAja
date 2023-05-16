<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipments = [
            [
                'transaction_id' => 1,
                'courier' => 'DHL',
                'shipping_address' => '123 Main St',
                'shipping_city' => 'New York',
                'shipping_province' => 'NY',
                'shipping_postal_code' => '10001',
                'shipping_cost' => 50,
                'status' => 'Shipped',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_id' => 2,
                'courier' => 'UPS',
                'shipping_address' => '456 Elm St',
                'shipping_city' => 'Los Angeles',
                'shipping_province' => 'CA',
                'shipping_postal_code' => '90001',
                'shipping_cost' => 75,
                'status' => 'In Transit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more shipments as needed
        ];

        DB::table('shipments')->insert($shipments);
    }
}
