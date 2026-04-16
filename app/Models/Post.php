<?php

namespace App\Models;

use App\Concerns\HasPortableContent;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Fillable(['title', 'slug', 'excerpt', 'body', 'meta_title', 'meta_description', 'author_name', 'published_at'])]
class Post extends Model implements HasMedia
{
    use HasPortableContent, InteractsWithMedia, SoftDeletes;

    protected function portableContentFields(): array
    {
        return ['body'];
    }

    protected function body(): Attribute
    {
        return $this->portableContent();
    }

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->nonQueued();

        $this->addMediaConversion('og')
            ->width(1200)
            ->height(630)
            ->nonQueued();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function displayTitle(): string
    {
        return $this->meta_title ?: $this->title.' — EMAS eKYC';
    }

    public function displayDescription(): ?string
    {
        return $this->meta_description ?: $this->excerpt ?: Str::limit(strip_tags($this->body ?? ''), 160);
    }
}
