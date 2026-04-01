<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class CtaBannerBlock
{
    public static function make(): Block
    {
        return Block::make('cta_banner')
            ->schema([
                TextInput::make('heading')->required(),
                Textarea::make('text'),
                TextInput::make('button_label'),
                TextInput::make('button_url'),
                Toggle::make('has_background')
                    ->label('Muted background')
                    ->default(true),
            ])
            ->columns(2)
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'CTA Banner';
                }

                return $state['heading'] ?? 'Untitled CTA';
            });
    }
}
