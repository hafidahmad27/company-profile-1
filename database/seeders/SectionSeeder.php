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
                // 'title' => ucfirst(fake()->words(5, true)),
                // 'subtitle' => ucfirst(fake()->words(20, true)),
                // 'content' => null,
                'image' => 'https://placehold.co/1100x500/light/blue',
                // 'button_text' => null,
                'order' => 1,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'carousel',
                // 'title' => ucfirst(fake()->words(5, true)),
                // 'subtitle' => ucfirst(fake()->words(20, true)),
                // 'content' => null,
                'image' => 'https://placehold.co/1100x500/grey/black',
                // 'button_text' => null,
                'order' => 2,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'carousel',
                // 'title' => ucfirst(fake()->words(5, true)),
                // 'subtitle' => ucfirst(fake()->words(20, true)),
                // 'content' => null,
                'image' => 'https://placehold.co/1100x500/black/light',
                // 'button_text' => null,
                'order' => 3,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'about-preview',
                'title' => 'About Us',
                // 'subtitle' => ucfirst(fake()->words(5, true)),
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi velit nihil accusantium, tempora neque vero esse dolorum cum recusandae veniam iusto, iure similique quas vel! Commodi praesentium tenetur minima culpa.',
                // 'image' => null,
                'button_text' => 'Read More',
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'product-category-best-sellers-preview',
                'title' => 'Our Best Seller Product Categories',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => null,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'product-best-sellers-preview',
                'title' => 'Our Best Seller Products',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => null,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'products-preview',
                'title' => 'Our Products',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => 'Read More',
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'article-category-popular-preview',
                'title' => 'Our Popular Article Categories',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => null,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'article-popular-preview',
                'title' => 'Our Popular Articles',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => null,
                'user_id' => 1,
            ],
            [
                'page_id' => 1,
                'section_key' => 'articles-preview',
                'title' => 'Our Articles',
                // 'subtitle' => null,
                // 'content' => null,
                // 'image' => null,
                'button_text' => 'Read More',
                'user_id' => 1,
            ],

            [
                'page_id' => 2,
                'section_key' => 'about',
                // 'title' => null,
                // 'subtitle' => ucwords(fake()->words(5, true)),
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi velit nihil accusantium, tempora neque vero esse dolorum cum recusandae veniam iusto, iure similique quas vel! Commodi praesentium tenetur minima culpa.',
                // 'image' => null,
                // 'button_text' => null,
                'user_id' => 1,
            ],

            [
                'page_id' => 3,
                'section_key' => 'products',
                // 'title' => null,
                // 'subtitle' => 'Our Products',
                // 'content' => null,
                // 'image' => null,
                // 'button_text' => null,
                'user_id' => 1,
            ],

            [
                'page_id' => 4,
                'section_key' => 'articles',
                // 'title' => null,
                // 'subtitle' => 'Our Articles',
                // 'content' => null,
                // 'image' => null,
                // 'button_text' => null,
                'user_id' => 1,
            ],

            [
                'page_id' => 5,
                'section_key' => 'contact',
                // 'title' => null,
                'subtitle' => 'For further information, you can contact us via:',
                // 'content' => null,
                // 'image' => null,
                // 'button_text' => null,
                'user_id' => 1,
            ],
        ]);
    }
}
