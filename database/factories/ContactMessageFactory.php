<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => '03' . fake()->numerify('########'), // 10 digit
            'whatsapp' => '08' . fake()->numerify('##########'), // 12 digit
            'subject' => fake()->words(2, true),
            'message' => fake()->paragraphs(5, true),
            'is_read' => fake()->boolean(),
            'user_id' => 1,
        ];
    }
}
