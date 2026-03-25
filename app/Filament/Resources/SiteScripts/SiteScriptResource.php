<?php

namespace App\Filament\Resources\SiteScripts;

use App\Filament\Resources\SiteScripts\Pages\CreateSiteScript;
use App\Filament\Resources\SiteScripts\Pages\EditSiteScript;
use App\Filament\Resources\SiteScripts\Pages\ListSiteScripts;
use App\Filament\Resources\SiteScripts\Schemas\SiteScriptForm;
use App\Filament\Resources\SiteScripts\Tables\SiteScriptsTable;
use App\Models\SiteScript;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteScriptResource extends Resource
{
    protected static ?string $model = SiteScript::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCodeBracket;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Custom Scripts';

    public static function form(Schema $schema): Schema
    {
        return SiteScriptForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteScriptsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSiteScripts::route('/'),
            'create' => CreateSiteScript::route('/create'),
            'edit' => EditSiteScript::route('/{record}/edit'),
        ];
    }
}
