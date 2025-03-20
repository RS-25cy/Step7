<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Sale;
use App\Models\Product; 

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 手動で特定のデータを挿入
        Sale::create([
            'product_id' => 1, // 適当な商品ID
            'quantity' => 2,
            'total_price' => 260, // 130円の商品を2個
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Sale::create([
            'product_id' => 2,
            'quantity' => 1,
            'total_price' => 150,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ファクトリーを利用して30件のランダムデータを生成
        Sale::factory()->count(30)->create();
    }
}