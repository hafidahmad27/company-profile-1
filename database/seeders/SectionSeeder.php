<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::factory()->createMany([
            [
                'page_id' => 1,
                'section_key' => 'carousel',
                'title' => ucfirst(fake()->words(5, true)),
                'subtitle' => ucfirst(fake()->words(20, true)),
                'content' => null,
                'image' => 'https://placehold.co/1100x500/light/blue',
                'button_text' => null,
                'button_link' => null,
                'order' => 1,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'carousel',
                'title' => ucfirst(fake()->words(5, true)),
                'subtitle' => ucfirst(fake()->words(20, true)),
                'content' => null,
                'image' => 'https://placehold.co/1100x500/grey/black',
                'button_text' => null,
                'button_link' => null,
                'order' => 2,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'carousel',
                'title' => ucfirst(fake()->words(5, true)),
                'subtitle' => ucfirst(fake()->words(20, true)),
                'content' => null,
                'image' => 'https://placehold.co/1100x500/black/light',
                'button_text' => null,
                'button_link' => null,
                'order' => 3,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'about-preview',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => fake()->paragraph(),
                'image' => null,
                'button_text' => 'Selengkapnya',
                'button_link' => 'about',
                'order' => 2,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'products-preview',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => fake()->paragraph(),
                'image' => null,
                'button_text' => 'Lihat selengkapnya',
                'button_link' => 'products',
                'order' => 3,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'articles-preview',
                'title' => ucfirst(fake()->words(3, true)),
                'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => fake()->paragraph(),
                'image' => null,
                'button_text' => 'Lihat selengkapnya',
                'button_link' => 'articles',
                'order' => 4,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 2,
                'section_key' => 'about',
                'title' => null,
                'subtitle' => null,
                'content' => fake()->paragraph(),
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 2,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 3,
                'section_key' => 'products',
                'title' => null,
                'subtitle' => ucfirst(fake()->words(2, true)),
                'content' => null,
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 3,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 4,
                'section_key' => 'articles',
                'title' => null,
                'subtitle' => ucfirst(fake()->words(3, true)),
                'content' => null,
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 4,
                'is_active' => true,
                'user_id' => 1,
            ],
        ]);
    }
}
