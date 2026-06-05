<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true) . ' Product',
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 200),
            'stock_quantity' => fake()->numberBetween(1, 100),
            'image_url' => 'img/products/' . fake()->numberBetween(1, 20) . '.jpg',
            'category_id' => fake()->numberBetween(1, 5),
            'user_id' => 1,
            'is_popular' => fake()->boolean(70),
            'is_latest_drop' => fake()->boolean(30),
        ];
    }
}
