<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section_key' => 'about-preview',
            'title' => fake()->sentence(3),
            'subtitle' => fake()->sentence(8),
            'content' => fake()->paragraph(),
            'is_active' => true,
        ];
    }
}
