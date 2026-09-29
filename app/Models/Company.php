<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::updating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    /**
     * Get logo URL.
     */
    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->logo ? Storage::url($this->logo) : null,
        );
    }

    /**
     * Get WhatsApp Link.
     */
    protected function waLink(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->phone
                ? 'https://wa.me/62' . ltrim($this->phone, '0')
                : null,
        );
    }
}
