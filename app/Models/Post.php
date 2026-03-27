<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

#[Fillable(['title', 'slug', 'excerpt', 'body', 'featured_image', 'published_at'])]
class Post extends Model
{
    use SoftDeletes;

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('homepage_posts'));
        static::deleted(fn () => Cache::forget('homepage_posts'));
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}
