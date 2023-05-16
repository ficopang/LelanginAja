<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'text' => 'Report 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'text' => 'Report 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more reports as needed
        ];

        DB::table('product_reports')->insert($reports);
    }
}
