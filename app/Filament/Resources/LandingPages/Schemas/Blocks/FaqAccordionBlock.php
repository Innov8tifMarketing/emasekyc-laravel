<?php

namespace App\Filament\Resources\LandingPages\Schemas\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class FaqAccordionBlock
{
    public static function make(): Block
    {
        return Block::make('faq_accordion')
            ->icon(Heroicon::QuestionMarkCircle)
            ->preview('filament.content.block-previews.faq-accordion')
            ->schema([
                TextInput::make('heading'),
                Repeater::make('items')
                    ->schema([
                        TextInput::make('question')->required(),
                        Textarea::make('answer')->required(),
                    ])
                    ->columnSpanFull(),
            ])
            ->label(function (?array $state): string {
                if ($state === null) {
                    return 'FAQ Accordion';
                }

                return $state['heading'] ?? 'FAQ Section';
            });
    }
}
