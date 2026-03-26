<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteScript extends Model
{
    protected $fillable = ['name', 'location', 'content', 'is_active'];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('site_scripts'));
        static::deleted(fn () => Cache::forget('site_scripts'));
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

}
