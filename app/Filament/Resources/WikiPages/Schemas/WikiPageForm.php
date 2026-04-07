<?php

namespace App\Filament\Resources\WikiPages\Schemas;

use App\Models\WikiPage;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class WikiPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Wiki Page')
                    ->tabs([
                        Tab::make('Content')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                Select::make('parent_id')
                                    ->label('Parent (Category)')
                                    ->options(fn () => WikiPage::whereNull('parent_id')->pluck('title', 'id'))
                                    ->placeholder('None (this is a category)')
                                    ->nullable(),
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                        'archived' => 'Archived',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                MarkdownEditor::make('body')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('images/wiki')
                                    ->columnSpanFull(),
                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('SEO & Meta')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->placeholder('Defaults to: {title} — EMAS eKYC'),
                                Textarea::make('meta_description')
                                    ->rows(3)
                                    ->placeholder('Defaults to excerpt'),
                                SpatieMediaLibraryFileUpload::make('og_image')
                                    ->collection('og_image')
                                    ->label('Open Graph Image')
                                    ->image()
                                    ->visibility('public')
                                    ->maxSize(2048),
                            ]),
                        Tab::make('Relations')
                            ->schema([
                                Select::make('relatedPages')
                                    ->label('Related Pages')
                                    ->relationship('relatedPages', 'title')
                                    ->multiple()
                                    ->preload(),
                            ]),
                        Tab::make('Settings')
                            ->schema([
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                                SpatieMediaLibraryFileUpload::make('featured_image')
                                    ->collection('featured_image')
                                    ->image()
                                    ->responsiveImages()
                                    ->visibility('public')
                                    ->maxSize(2048),
                                Textarea::make('icon_svg')
                                    ->label('Icon SVG')
                                    ->hint('SVG markup for category index cards')
                                    ->rows(4),
                                DateTimePicker::make('published_at'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
