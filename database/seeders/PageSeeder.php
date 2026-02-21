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
                'name' => 'Home',
                'slug' => 'home',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'About',
                'slug' => 'about',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Products',
                'slug' => 'products',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Articles',
                'slug' => 'articles',
                'order' => 4,
                'is_active' => true,
            ],
        ]);
    }
}
