<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->createMany([
            [
                'title' => 'Home',
                'slug' => 'index',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'About',
                'slug' => 'about',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Products',
                'slug' => 'products',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Articles',
                'slug' => 'articles',
                'order' => 4,
                'is_active' => true,
            ],
        ]);
    }
}
