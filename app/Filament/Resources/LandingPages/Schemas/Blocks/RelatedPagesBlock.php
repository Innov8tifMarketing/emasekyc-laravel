<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class RelatedPagesBlock
{
    public static function make(): Block
    {
        return Block::make('related_pages')
            ->schema([
                TextInput::make('heading'),
                Repeater::make('pages')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('url')->required(),
                        Textarea::make('description'),
                    ])
                    ->columnSpanFull(),
            ])
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Related Pages';
                }

                return $state['heading'] ?? 'Untitled related pages';
            });
    }
}
