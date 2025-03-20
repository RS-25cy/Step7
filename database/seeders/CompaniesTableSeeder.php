<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company; // ← 追加

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 手動データ（3社）
        Company::insert([
            [
                'company_name' => 'Coca-Cola',
                'representative_name' => 'John Doe',
                'street_address' => '123 Coca-Cola Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Pepsi',
                'representative_name' => 'Jane Smith',
                'street_address' => '456 Pepsi Avenue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Asahi',
                'representative_name' => 'Taro Yamada',
                'street_address' => '789 Asahi Road',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ファクトリーでランダムデータを10件生成
        Company::factory()->count(10)->create();
    }
}