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
                'subtitle' => ucfirst(fake()->words(7, true)),
                'image' => fake()->imageUrl(800, 600, 'business', true, 'logo'),
                'button_text' => 'Selengkapnya',
                'button_link' => '/about',
                'order' => 1,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'about',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(4, true)),
                'image' => null,
                'button_text' => 'Lihat selengkapnya',
                'button_link' => '/about',
                'order' => 2,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'products',
                'title' => ucfirst(fake()->words(1, true)),
                'subtitle' => ucfirst(fake()->words(2, true)),
                'image' => null,
                'button_text' => 'Lihat selengkapnya',
                'button_link' => '/products',
                'order' => 3,
                'is_active' => true,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'articles',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(5, true)),
                'image' => null,
                'button_text' => 'Lihat selengkapnya',
                'button_link' => '/articles',
                'order' => 4,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 2,
                'section_key' => 'about',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(4, true)),
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 1,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 3,
                'section_key' => 'products',
                'title' => ucfirst(fake()->words(1, true)),
                'subtitle' => ucfirst(fake()->words(2, true)),
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 1,
                'is_active' => true,
                'user_id' => 1,
            ],

            [
                'page_id' => 4,
                'section_key' => 'article',
                'title' => ucfirst(fake()->words(2, true)),
                'subtitle' => ucfirst(fake()->words(5, true)),
                'image' => null,
                'button_text' => null,
                'button_link' => null,
                'order' => 1,
                'is_active' => true,
                'user_id' => 1,
            ],
        ]);
    }
}
