<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'company_id' => rand(1, 3), // CompaniesTableSeeder で作成した ID の範囲
            'price' => $this->faker->numberBetween(100, 500),
            'stock' => $this->faker->numberBetween(1, 50),
            'comment' => $this->faker->sentence(),
            'img_path' => $this->faker->imageUrl(200, 200),
        ];
    }
}