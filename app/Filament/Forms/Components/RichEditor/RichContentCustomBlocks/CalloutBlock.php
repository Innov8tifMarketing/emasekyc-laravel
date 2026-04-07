<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class CalloutBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'callout';
    }

    public static function getLabel(): string
    {
        return 'Callout';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Add a callout box to highlight important information')
            ->schema([
                Select::make('type')
                    ->options([
                        'info' => 'Info',
                        'warning' => 'Warning',
                        'success' => 'Success',
                        'error' => 'Error',
                    ])
                    ->default('info')
                    ->required(),
                TextInput::make('title'),
                Textarea::make('content')
                    ->required()
                    ->rows(4),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $type = $config['type'] ?? 'info';
        $title = e($config['title'] ?? '');
        $content = e($config['content'] ?? '');
        $badge = ucfirst($type);

        return "<div style=\"padding: 12px; border-left: 4px solid; border-radius: 4px; background: #f0f9ff;\"><strong>[{$badge}]</strong> {$title}<br><small>{$content}</small></div>";
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function toHtml(array $config, array $data): string
    {
        $type = $config['type'] ?? 'info';
        $title = e($config['title'] ?? '');
        $content = e($config['content'] ?? '');

        $iconMap = [
            'info' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'warning' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            'success' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'error' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 shrink-0 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        ];
        $icon = $iconMap[$type] ?? $iconMap['info'];
        $titleHtml = $title ? "<h4 class=\"font-bold\">{$title}</h4>" : '';

        return "<div class=\"alert alert-{$type} my-4\">{$icon}<div>{$titleHtml}<p>{$content}</p></div></div>";
    }
}
