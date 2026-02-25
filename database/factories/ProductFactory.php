<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->words(3, true);

        return [
            'product_category_id' => fake()->numberBetween(1, 4),
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 10000, 99990000),
            'image' => 'https://placehold.co/300x200/light/blue',
            'published_at' => fake()->dateTime(),
            'is_published' => fake()->boolean(),
            'user_id' => 1,
        ];
    }
}
