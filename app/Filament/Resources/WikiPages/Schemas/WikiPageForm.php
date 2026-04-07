<?php

namespace App\Filament\Resources\WikiPages\Schemas;

use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\ChecklistBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\DetailsBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\GridBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\VideoBlock;
use App\Filament\Schemas\SeoFields;
use App\Models\WikiPage;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
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
                                Hidden::make('body_format')
                                    ->default('rich'),
                                RichEditor::make('body')
                                    ->customBlocks([
                                        CalloutBlock::class,
                                        DetailsBlock::class,
                                        ChecklistBlock::class,
                                        VideoBlock::class,
                                        GridBlock::class,
                                    ])
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'strike', 'link'],
                                        ['h2', 'h3', 'h4'],
                                        ['bulletList', 'orderedList', 'blockquote'],
                                        ['table', 'attachFiles', 'customBlocks'],
                                        ['undo', 'redo'],
                                    ])
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('images/wiki')
                                    ->columnSpanFull(),
                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('SEO & Meta')
                            ->schema(SeoFields::make()),
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
