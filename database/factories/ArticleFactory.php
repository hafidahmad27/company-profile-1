<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(5, true);

        return [
            'article_category_id' => fake()->numberBetween(1, 4),
            'title' => ucwords($title),
            'slug' => Str::slug($title),
            'content' => fake()->paragraph(),
            'image' => fake()->imageUrl(400, 300, 'business', true, 'slide'),
            'published_at' => fake()->dateTime(),
            'is_published' => fake()->boolean(),
            'views' => fake()->numberBetween(5, 999),
            'user_id' => 1,
        ];
    }
}
