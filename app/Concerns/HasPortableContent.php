<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait HasPortableContent
{
    protected static string $mediaPlaceholder = '{{media}}';

    /**
     * Define which model attributes contain rich HTML content with media URLs.
     *
     * @return array<string>
     */
    abstract protected function portableContentFields(): array;

    public function initializeHasPortableContent(): void
    {
        // Ensure portable content fields are not in $casts to avoid conflicts
    }

    protected function getMediaBaseUrl(): string
    {
        $disk = Storage::disk();
        $url = rtrim($disk->url(''), '/');

        // For local disks, use path-only URL to avoid port mismatches
        $parsed = parse_url($url);
        $appHost = parse_url(config('app.url'), PHP_URL_HOST);

        if (($parsed['host'] ?? '') === $appHost) {
            return ($parsed['path'] ?? '') ?: '/storage';
        }

        return $url;
    }

    protected function resolveMediaPlaceholder(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return str_replace(static::$mediaPlaceholder, $this->getMediaBaseUrl(), $value);
    }

    protected function storeMediaPlaceholder(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return str_replace($this->getMediaBaseUrl(), static::$mediaPlaceholder, $value);
    }

    /**
     * Create an Attribute cast for a portable content field.
     */
    protected function portableContent(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $this->resolveMediaPlaceholder($value),
            set: fn (?string $value) => $this->storeMediaPlaceholder($value),
        );
    }
}
