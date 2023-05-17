<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create dummy chats
        for ($i = 0; $i < 10; $i++) {
            $sender = User::inRandomOrder()->first();
            $receiver = User::where('id', '!=', $sender->id)->inRandomOrder()->first();

            Chat::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'text' => $faker->sentence(),
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}
