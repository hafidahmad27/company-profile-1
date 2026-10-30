<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactMessage extends Model
{
    /** @use HasFactory<\Database\Factories\ContactMessageFactory> */
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::updating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    /**
     * Get subject with headline.
     */
    protected function subjectHeadline(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->subject ? Str::headline($this->subject) : null,
        );
    }
    /**
     * Get email link.
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
     * Get phone link.
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
     * Get whatsApp link.
     */
    protected function whatsappLink(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->whatsapp
                ? 'https://wa.me/62' . ltrim($this->whatsapp, '0')
                : null,
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'updated_at' => 'datetime',
        ];
    }
}
