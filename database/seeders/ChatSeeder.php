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
        $users = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $senderId = $faker->randomElement($users);
            $receiverId = $faker->randomElement($users);

            // Make sure sender and receiver are different users
            while ($senderId === $receiverId) {
                $receiverId = $faker->randomElement($users);
            }

            DB::table('chats')->insert([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'text' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
