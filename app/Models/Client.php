<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

#[Fillable(['name', 'website_url', 'logo', 'sort_order', 'is_active'])]
class Client extends Model
{

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('homepage_clients'));
        static::deleted(fn () => Cache::forget('homepage_clients'));
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
