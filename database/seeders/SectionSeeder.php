<?php

namespace Database\Seeders;

use App\Models\Page;
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
                'title' => null,
                'subtitle' => null,
                'content' => null,
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'is_active' => false,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'products-preview',
                'title' => null,
                'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => null,
                'image' => null,
                'button_text' => 'Selengkapnya',
                'button_link' => 'products',
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'articles-preview',
                'title' => null,
                'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => null,
                'image' => null,
                'button_text' => 'Selengkapnya',
                'button_link' => 'articles',
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 2,
                'section_key' => 'about',
                'title' => null,
                'subtitle' => null,
                'content' => fake()->paragraphs(3, true),
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 3,
                'section_key' => 'products',
                'title' => null,
                'subtitle' => null,
                'content' => null,
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 4,
                'section_key' => 'articles',
                'title' => null,
                'subtitle' => null,
                'content' => null,
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'user_id' => 1,
            ],
        ]);
    }
}
