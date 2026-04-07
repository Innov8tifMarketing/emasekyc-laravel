<?php

namespace App\Filament\Resources\LandingPages\Schemas;

use App\Filament\Resources\LandingPages\Schemas\Blocks\CtaBannerBlock;
use App\Filament\Resources\LandingPages\Schemas\Blocks\FeatureGridBlock;
use App\Filament\Resources\LandingPages\Schemas\Blocks\HeroBlock;
use App\Filament\Resources\LandingPages\Schemas\Blocks\ProseBlock;
use App\Filament\Resources\LandingPages\Schemas\Blocks\RelatedPagesBlock;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class LandingPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Landing Page')
                    ->tabs([
                        self::contentTab(),
                        self::formConfigTab(),
                        self::seoTab(),
                        self::mediaTab(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    private static function contentTab(): Tab
    {
        return Tab::make('Content')
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Builder::make('blocks')
                    ->blocks([
                        HeroBlock::make(),
                        FeatureGridBlock::make(),
                        ProseBlock::make(),
                        CtaBannerBlock::make(),
                        RelatedPagesBlock::make(),
                    ])
                    ->collapsible()
                    ->collapsed()
                    ->columnSpanFull(),
            ]);
    }

    private static function formConfigTab(): Tab
    {
        return Tab::make('Lead Form')
            ->schema([
                Toggle::make('form_config.enabled')
                    ->label('Enable lead capture form')
                    ->live(),
                Section::make('Form Settings')
                    ->schema([
                        TextInput::make('form_config.heading')
                            ->label('Form heading')
                            ->default('Get In Touch'),
                        Textarea::make('form_config.description')
                            ->label('Form description'),
                        TextInput::make('form_config.button_text')
                            ->label('Submit button text')
                            ->default('Submit'),
                        Toggle::make('form_config.show_last_name')
                            ->label('Show last name field')
                            ->default(true),
                        Toggle::make('form_config.show_company')
                            ->label('Show company field')
                            ->default(true),
                        Toggle::make('form_config.show_phone')
                            ->label('Show phone field')
                            ->default(true),
                    ])
                    ->visible(fn (Get $get): bool => (bool) $get('form_config.enabled'))
                    ->columnSpanFull(),
                Section::make('Thank You Page')
                    ->schema([
                        TextInput::make('form_config.thank_you.heading')
                            ->label('Heading')
                            ->default('Thank You!'),
                        Textarea::make('form_config.thank_you.message')
                            ->label('Message'),
                        Toggle::make('form_config.thank_you.show_pdf_download')
                            ->label('Show PDF download button'),
                        TextInput::make('form_config.thank_you.cta_text')
                            ->label('CTA button text')
                            ->default('Explore EMAS CIDA'),
                        TextInput::make('form_config.thank_you.cta_url')
                            ->label('CTA button URL')
                            ->default('/solutions/emas-cida'),
                    ])
                    ->visible(fn (Get $get): bool => (bool) $get('form_config.enabled'))
                    ->columnSpanFull(),
            ]);
    }

    private static function seoTab(): Tab
    {
        return Tab::make('SEO & Settings')
            ->schema([
                TextInput::make('meta_title')
                    ->label('Meta title'),
                Textarea::make('meta_description')
                    ->label('Meta description')
                    ->rows(3),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),
                DateTimePicker::make('published_at')
                    ->label('Publish date'),
            ]);
    }

    private static function mediaTab(): Tab
    {
        return Tab::make('Media')
            ->schema([
                SpatieMediaLibraryFileUpload::make('pdf')
                    ->collection('pdfs')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(20480)
                    ->visibility('public')
                    ->label('Gated PDF download'),
                SpatieMediaLibraryFileUpload::make('images')
                    ->collection('images')
                    ->multiple()
                    ->image()
                    ->responsiveImages()
                    ->visibility('public')
                    ->label('Page images'),
            ]);
    }
}
