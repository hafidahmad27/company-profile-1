<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleCategory::factory()->createMany([
            [
                'name' => 'Category A',
                'slug' => Str::slug('Category A'),
                'is_active' => true,
            ],
            [
                'name' => 'Category B',
                'slug' => Str::slug('Category B'),
                'is_active' => true,
            ],
            [
                'name' => 'Category C',
                'slug' => Str::slug('Category C'),
                'is_active' => true,
            ],
        ]);
    }
}
