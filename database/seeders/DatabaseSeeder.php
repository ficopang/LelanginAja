<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'password',
        //     'address' => 'jalan ... xxx',
        //     'phone_number' => '0812323213'
        // ]);

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductReportSeeder::class);
        $this->call(WithdrawHistorySeeder::class);
        $this->call(BidSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(ShipmentSeeder::class);
        $this->call(ChatSeeder::class);
    }
}
