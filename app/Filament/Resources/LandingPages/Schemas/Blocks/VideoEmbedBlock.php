<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class VideoEmbedBlock
{
    public static function make(): Block
    {
        return Block::make('video_embed')
            ->icon(Heroicon::PlayCircle)
            ->preview('filament.content.block-previews.video-embed')
            ->schema([
                TextInput::make('heading'),
                TextInput::make('video_url')
                    ->label('Video URL')
                    ->required()
                    ->helperText('Paste a YouTube or Vimeo URL'),
                TextInput::make('caption'),
            ])
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Video Embed';
                }

                return $state['heading'] ?? 'Video';
            });
    }
}
