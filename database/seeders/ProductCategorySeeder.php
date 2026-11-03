<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::factory()->createMany([
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
        ]);
    }
}
