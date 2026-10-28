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
     * Get Email Link.
     */
    protected function emailLink(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->email
                ? 'mailto:' . $this->email
                : null,
        );
    }

    /**
     * Get Phone Link.
     */
    protected function phoneLink(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->phone
                ? 'tel:' . $this->phone
                : null,
        );
    }

    /**
     * Get WhatsApp Link.
     */
    protected function whatsappLink(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->whatsapp
                ? 'https://wa.me/62' . ltrim($this->whatsapp, '0')
                : null,
        );
    }
}
