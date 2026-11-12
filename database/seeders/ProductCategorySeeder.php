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
                'name' => 'Category A',
                'slug' => Str::slug('Category A'),
                'is_active' => true,
            ],
            [
                'name' => 'Category B',
                'slug' => Str::slug('Category B'),
                'is_active' => true,
            ],
        ]);
    }
}
