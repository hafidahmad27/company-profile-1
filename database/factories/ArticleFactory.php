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
        $title = fake()->words(fake()->numberBetween(4, 8), true);

        return [
            'article_category_id' => fake()->numberBetween(1, 3),
            'title' => ucwords($title),
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'published_at' => fake()->dateTimeBetween('-2 days', 'now'),
            'is_published' => fake()->boolean(),
            'views' => fake()->numberBetween(0, 999),
            'user_id' => 1,
        ];
    }
}
