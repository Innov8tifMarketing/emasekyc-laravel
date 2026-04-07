<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class VideoBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'video';
    }

    public static function getLabel(): string
    {
        return 'Video Embed';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Embed a YouTube or Vimeo video')
            ->schema([
                Select::make('platform')
                    ->options([
                        'youtube' => 'YouTube',
                        'vimeo' => 'Vimeo',
                    ])
                    ->default('youtube')
                    ->required(),
                TextInput::make('video_id')
                    ->label('Video ID')
                    ->required()
                    ->helperText('YouTube: the ID after v= in the URL. Vimeo: the numeric ID.'),
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $platform = ucfirst($config['platform'] ?? 'youtube');
        $id = e($config['video_id'] ?? '');

        return "<div style=\"padding: 12px; background: #1a1a2e; color: white; border-radius: 8px; text-align: center;\">&#9654; {$platform} Video: {$id}</div>";
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function toHtml(array $config, array $data): string
    {
        $platform = $config['platform'] ?? 'youtube';
        $id = e(trim($config['video_id'] ?? ''));

        $src = match ($platform) {
            'youtube' => "https://www.youtube-nocookie.com/embed/{$id}",
            'vimeo' => "https://player.vimeo.com/video/{$id}",
            default => '',
        };

        if (! $src) {
            return '';
        }

        return "<div class=\"not-prose aspect-video my-4\"><iframe src=\"{$src}\" class=\"w-full h-full rounded-lg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen loading=\"lazy\"></iframe></div>";
    }
}
