<?php

namespace App\Filament\Resources\SiteScripts\Pages;

use App\Filament\Resources\SiteScripts\SiteScriptResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSiteScripts extends ListRecords
{
    protected static string $resource = SiteScriptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
