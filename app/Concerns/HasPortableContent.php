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

    protected function resolveMediaPlaceholder(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $diskUrl = rtrim(Storage::disk()->url(''), '/');

        return str_replace(static::$mediaPlaceholder, $diskUrl, $value);
    }

    protected function storeMediaPlaceholder(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $diskUrl = rtrim(Storage::disk()->url(''), '/');

        return str_replace($diskUrl, static::$mediaPlaceholder, $value);
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
