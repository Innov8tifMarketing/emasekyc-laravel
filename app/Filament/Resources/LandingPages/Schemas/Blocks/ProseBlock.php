<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class ProseBlock
{
    public static function make(): Block
    {
        return Block::make('prose')
            ->schema([
                TextInput::make('heading'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('has_background')
                    ->label('Muted background'),
            ])
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Prose';
                }

                return $state['heading'] ?? 'Untitled prose';
            });
    }
}
