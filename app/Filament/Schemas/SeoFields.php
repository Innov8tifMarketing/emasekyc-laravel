<?php

namespace App\Filament\Schemas;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SeoFields
{
    /**
     * @return array<int, Component>
     */
    public static function make(): array
    {
        return [
            TextInput::make('meta_title')
                ->label('Meta Title')
                ->placeholder('Defaults to page title')
                ->maxLength(70)
                ->live(onBlur: true)
                ->helperText(fn (?string $state) => strlen($state ?? '').'/70 characters'),
            Textarea::make('meta_description')
                ->label('Meta Description')
                ->placeholder('Defaults to excerpt or first paragraph')
                ->rows(3)
                ->maxLength(160)
                ->live(onBlur: true)
                ->helperText(fn (?string $state) => strlen($state ?? '').'/160 characters'),
            SpatieMediaLibraryFileUpload::make('og_image')
                ->collection('og_image')
                ->label('Social Share Image')
                ->image()
                ->visibility('public')
                ->maxSize(2048)
                ->helperText('Recommended: 1200x630px'),
        ];
    }
}
