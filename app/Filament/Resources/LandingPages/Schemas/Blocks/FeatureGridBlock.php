<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class FeatureGridBlock
{
    public static function make(): Block
    {
        return Block::make('feature_grid')
            ->schema([
                TextInput::make('heading'),
                Select::make('columns')
                    ->options([
                        2 => '2 Columns',
                        3 => '3 Columns',
                    ])
                    ->default(3),
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
            ->columns(3)
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Feature Grid';
                }

                return $state['heading'] ?? 'Untitled grid';
            });
    }
}
