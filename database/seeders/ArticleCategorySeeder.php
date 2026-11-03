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
                'name' => 'Category 1',
                'slug' => Str::slug('Category 1'),
                'is_active' => true,
            ],
            [
                'name' => 'Category 2',
                'slug' => Str::slug('Category 2'),
                'is_active' => true,
            ],
            [
                'name' => 'Category 3',
                'slug' => Str::slug('Category 3'),
                'is_active' => true,
            ],
        ]);
    }
}
