<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chats = [
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'text' => 'Hello, how are you?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'text' => 'I am good, thank you!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more chat messages as needed
        ];

        DB::table('chats')->insert($chats);
    }
}
