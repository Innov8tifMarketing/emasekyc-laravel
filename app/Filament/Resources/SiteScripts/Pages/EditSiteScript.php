<?php

namespace App\Filament\Resources\SiteScripts\Pages;

use App\Filament\Resources\SiteScripts\SiteScriptResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSiteScript extends EditRecord
{
    protected static string $resource = SiteScriptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
