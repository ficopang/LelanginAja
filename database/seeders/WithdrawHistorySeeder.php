<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WithdrawHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $userId = $faker->randomElement($users);

            DB::table('withdraw_histories')->insert([
                'user_id' => $userId,
                'description' => $faker->sentence,
                'amount' => $faker->numberBetween(1000, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
