<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\TextInput;

class ChecklistBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'checklist';
    }

    public static function getLabel(): string
    {
        return 'Checklist';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Add a checklist with check icons')
            ->schema([
                Repeater::make('items')
                    ->schema([
                        TextInput::make('text')->required(),
                    ])
                    ->minItems(1),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $count = count($config['items'] ?? []);

        return "<div style=\"padding: 8px; border: 1px solid #e5e7eb; border-radius: 4px;\">Checklist ({$count} items)</div>";
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function toHtml(array $config, array $data): string
    {
        $checkSvg = '<svg class="w-5 h-5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
        $items = '';

        foreach ($config['items'] ?? [] as $item) {
            $text = e($item['text'] ?? '');
            $items .= "<li class=\"flex items-start gap-2\">{$checkSvg}<span>{$text}</span></li>\n";
        }

        return "<ul class=\"not-prose space-y-2 my-4\">\n{$items}</ul>";
    }
}
