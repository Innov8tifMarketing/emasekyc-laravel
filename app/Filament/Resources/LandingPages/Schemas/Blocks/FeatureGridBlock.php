<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class FeatureGridBlock
{
    public static function make(): Block
    {
        return Block::make('feature_grid')
            ->icon(Heroicon::Squares2x2)
            ->preview('filament.content.block-previews.feature-grid')
            ->schema([
                TextInput::make('heading'),
                Select::make('style')
                    ->options([
                        'cards' => 'Cards',
                        'checklist' => 'Checklist',
                        'challenges' => 'Challenges',
                        'stats' => 'Stats',
                    ])
                    ->default('cards'),
                Repeater::make('items')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('description'),
                        TextInput::make('value')
                            ->helperText('For stats style: the metric value (e.g., "10M+")'),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(2)
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Feature Grid';
                }

                return $state['heading'] ?? 'Untitled grid';
            });
    }
}
