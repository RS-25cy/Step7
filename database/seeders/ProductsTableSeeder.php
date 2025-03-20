<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['company_id' => 1, 'product_name' => 'Coca-Cola', 'price' => 130, 'stock' => 100, 'comment' => 'Classic Coke', 'img_path' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['company_id' => 2, 'product_name' => 'Pepsi', 'price' => 120, 'stock' => 80, 'comment' => 'Pepsi Blue', 'img_path' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['company_id' => 3, 'product_name' => 'Asahi Beer', 'price' => 200, 'stock' => 50, 'comment' => 'Japanese Beer', 'img_path' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}