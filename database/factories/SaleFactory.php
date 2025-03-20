<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // ランダムな商品を紐づけ
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}