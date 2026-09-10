<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ProductCategoryFactory> */
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    /**
     * Set name and slug.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => [
                'name' => $value,
                'slug' => Str::slug($value),
            ],
        );
    }
}
