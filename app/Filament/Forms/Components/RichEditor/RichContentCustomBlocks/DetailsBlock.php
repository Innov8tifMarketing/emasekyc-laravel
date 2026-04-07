<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class DetailsBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'details';
    }

    public static function getLabel(): string
    {
        return 'Collapsible Details';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Add a collapsible section')
            ->schema([
                TextInput::make('summary')
                    ->label('Summary / Title')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->rows(4),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $summary = e($config['summary'] ?? 'Details');

        return "<details style=\"padding: 8px; border: 1px solid #e5e7eb; border-radius: 4px;\"><summary><strong>{$summary}</strong></summary></details>";
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function toHtml(array $config, array $data): string
    {
        $summary = e($config['summary'] ?? '');
        $content = e($config['content'] ?? '');

        return "<details class=\"collapse collapse-arrow bg-base-200 my-4\"><summary class=\"collapse-title font-medium\">{$summary}</summary><div class=\"collapse-content\"><p>{$content}</p></div></details>";
    }
}
