<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class HeroBlock
{
    public static function make(): Block
    {
        return Block::make('hero')
            ->schema([
                TextInput::make('heading')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('subheading')
                    ->columnSpanFull(),
                TextInput::make('badge_text'),
                Select::make('background_style')
                    ->options([
                        'primary' => 'Primary',
                        'dark' => 'Dark',
                    ])
                    ->default('primary'),
                Repeater::make('cta_buttons')
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('url')->required(),
                        Select::make('variant')
                            ->options([
                                'primary' => 'Primary',
                                'outline' => 'Outline',
                            ])
                            ->default('primary'),
                    ])
                    ->maxItems(2)
                    ->grid(2)
                    ->columnSpanFull(),
            ])
            ->columns(2)
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Hero';
                }

                return $state['heading'] ?? 'Untitled hero';
            });
    }
}
