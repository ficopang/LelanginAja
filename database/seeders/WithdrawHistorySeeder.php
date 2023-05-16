<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [
            [
                'user_id' => 1,
                'description' => 'Withdrawal 1',
                'amount' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'description' => 'Withdrawal 2',
                'amount' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more withdrawal histories as needed
        ];

        DB::table('withdraw_histories')->insert($histories);
    }
}
