<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'slug' => Str::slug('index'),
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'About',
                'slug' => Str::slug('About'),
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Products',
                'slug' => Str::slug('Products'),
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Articles',
                'slug' => Str::slug('Articles'),
                'order' => 4,
                'is_active' => true,
            ],
        ]);
    }
}
