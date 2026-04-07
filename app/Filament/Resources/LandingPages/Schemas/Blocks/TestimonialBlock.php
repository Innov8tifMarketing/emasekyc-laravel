<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class TestimonialBlock
{
    public static function make(): Block
    {
        return Block::make('testimonial')
            ->icon(Heroicon::ChatBubbleBottomCenterText)
            ->preview('filament.content.block-previews.testimonial')
            ->schema([
                TextInput::make('heading'),
                Repeater::make('items')
                    ->schema([
                        Textarea::make('quote')->required(),
                        TextInput::make('author')->required(),
                        TextInput::make('role'),
                    ])
                    ->columnSpanFull(),
            ])
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'Testimonials';
                }

                return $state['heading'] ?? 'Testimonials';
            });
    }
}
