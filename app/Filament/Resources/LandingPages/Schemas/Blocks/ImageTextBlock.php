<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class ImageTextBlock
{
    public static function make(): Block
    {
        return Block::make('image_text')
            ->icon(Heroicon::Photo)
            ->preview('filament.content.block-previews.image-text')
            ->schema([
                TextInput::make('heading'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('image_url')
                    ->label('Image URL')
                    ->helperText('Paste the URL of an uploaded image'),
                Select::make('image_position')
                    ->options([
                        'left' => 'Image Left',
                        'right' => 'Image Right',
                    ])
                    ->default('left'),
            ])
            ->columns(2)
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Image + Text';
                }

                return $state['heading'] ?? 'Image + Text';
            });
    }
}
