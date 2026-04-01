<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lead Information')
                    ->schema([
                        TextEntry::make('first_name'),
                        TextEntry::make('last_name'),
                        TextEntry::make('email')
                            ->copyable(),
                        TextEntry::make('phone'),
                        TextEntry::make('company'),
                        TextEntry::make('original_source')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'landing_page' => 'info',
                                'contact_form' => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('created_at')
                            ->dateTime(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
