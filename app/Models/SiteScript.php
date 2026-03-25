<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteScript extends Model
{
    protected $guarded = [];

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

    public function scopeForLocation($query, string $location)
    {
        return $query->where('location', $location);
    }
}
