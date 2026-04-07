<?php

namespace App\Filament\Resources\LandingPages\Pages;

use App\Filament\Resources\LandingPages\LandingPageResource;
use App\Filament\Resources\LandingPages\PageTemplates;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingPage extends CreateRecord
{
    protected static string $resource = LandingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('loadTemplate')
                ->label('Load Template')
                ->icon('heroicon-o-document-duplicate')
                ->color('gray')
                ->schema([
                    Select::make('template')
                        ->label('Page Template')
                        ->options(PageTemplates::options())
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $blocks = PageTemplates::blocks($data['template']);

                    $this->form->fill([
                        'blocks' => $blocks,
                    ]);
                }),
        ];
    }
}
