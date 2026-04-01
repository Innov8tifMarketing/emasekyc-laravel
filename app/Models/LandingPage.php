<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Fillable(['title', 'slug', 'blocks', 'form_config', 'meta_title', 'meta_description', 'status', 'published_at'])]
class LandingPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    public const array ALLOWED_BLOCK_TYPES = [
        'hero',
        'feature_grid',
        'prose',
        'cta_banner',
        'related_pages',
    ];

    protected function casts(): array
    {
        return [
            'blocks' => 'array',
            'form_config' => 'array',
            'published_at' => 'datetime',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pdfs')->singleFile();
        $this->addMediaCollection('images');
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        return $this->where($field ?? 'slug', $value)
            ->published()
            ->first();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function leadActivities(): HasMany
    {
        return $this->hasMany(LeadActivity::class);
    }

    public function isFormEnabled(): bool
    {
        return (bool) data_get($this->form_config, 'enabled', false);
    }

    public function hasPdf(): bool
    {
        return $this->hasMedia('pdfs');
    }
}
