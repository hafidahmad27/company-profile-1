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
                'name' => 'Berita',
                'slug' => Str::slug('Berita'),
                'is_active' => true,
            ],
            [
                'name' => 'Informasi',
                'slug' => Str::slug('Informasi'),
                'is_active' => true,
            ],
            [
                'name' => 'Pengumuman',
                'slug' => Str::slug('Pengumuman'),
                'is_active' => true,
            ],
        ]);
    }
}
