<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'balance' => 1000000,
                'password' => Hash::make('password'),
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // dummy
        DB::table('users')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'balance' => 1000000,
            'password' => Hash::make('admin123'),
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}