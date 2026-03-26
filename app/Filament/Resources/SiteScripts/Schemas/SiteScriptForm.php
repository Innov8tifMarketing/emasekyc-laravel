<?php

namespace App\Filament\Resources\SiteScripts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SiteScriptForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->helperText('A label to identify this script (e.g. "Google Analytics", "Meta Pixel")'),
                Select::make('location')
                    ->options([
                        'head' => 'Head (<head>)',
                        'body_start' => 'Body Start (after <body>)',
                        'body_end' => 'Body End (before </body>)',
                    ])
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->rows(10)
                    ->helperText('Paste the full script tag(s) here. Warning: content is rendered unescaped on every page — only use trusted code (e.g. analytics snippets).')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
