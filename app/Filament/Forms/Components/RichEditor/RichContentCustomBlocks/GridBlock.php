<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class GridBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'grid';
    }

    public static function getLabel(): string
    {
        return 'Content Grid';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Create a multi-column grid layout')
            ->schema([
                Select::make('columns')
                    ->options([
                        2 => '2 Columns',
                        3 => '3 Columns',
                        4 => '4 Columns',
                    ])
                    ->default(2)
                    ->required(),
                Repeater::make('sections')
                    ->schema([
                        TextInput::make('heading')->required(),
                        Textarea::make('content')->rows(3),
                    ])
                    ->minItems(2),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $cols = $config['columns'] ?? 2;
        $count = count($config['sections'] ?? []);

        return "<div style=\"padding: 8px; border: 1px solid #e5e7eb; border-radius: 4px;\">Grid: {$cols} columns, {$count} sections</div>";
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function toHtml(array $config, array $data): string
    {
        $cols = $config['columns'] ?? 2;
        $html = "<div class=\"not-prose\"><div class=\"grid sm:grid-cols-{$cols} gap-6 my-6\">";

        foreach ($config['sections'] ?? [] as $section) {
            $heading = e($section['heading'] ?? '');
            $content = e($section['content'] ?? '');
            $html .= "<div><h3 class=\"font-semibold mb-2\">{$heading}</h3><p>{$content}</p></div>";
        }

        $html .= '</div></div>';

        return $html;
    }
}
