<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BinusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents('C:\xampp\htdocs\LaravelProjects\kuliah\LelanginAja\database\seeders\data.json');
        $data = json_decode($jsonData, true);

        $classPeopleList = &$data['classPeopleList'];
        $faker = Faker::create();

        foreach ($classPeopleList as &$person) {
            $studentCode = $person['studentCode'];
            $studentName = $person['studentName'];

            $nameParts = explode(' ', $studentName);
            $first_name = $nameParts[0];
            $last_name = isset($nameParts[1]) ? $nameParts[1] : '';
            $end_name = end($nameParts);

            DB::table('users')->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $person['email'],
                'email_verified_at' => now(),
                'balance' => 1000000,
                'password' => Hash::make($studentCode),
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // $email = strtolower($first_name . '.' . $end_name . '@binus.ac.id');
            // $person['email'] = $email;
        }
        // $newJsonData = json_encode($data, JSON_PRETTY_PRINT);

        // $file = 'C:\xampp\htdocs\LaravelProjects\kuliah\LelanginAja\database\seeders\data.json';
        // file_put_contents($file, $newJsonData);
    }
}
