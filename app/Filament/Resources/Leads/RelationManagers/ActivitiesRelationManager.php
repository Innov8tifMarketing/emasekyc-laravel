<?php

namespace App\Filament\Resources\Leads\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $title = 'Activity Timeline';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'form_submission' => 'info',
                        'contact_form' => 'success',
                        'pdf_download' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                TextColumn::make('landingPage.title')
                    ->label('Landing Page')
                    ->placeholder('—'),
                TextColumn::make('metadata')
                    ->label('Details')
                    ->formatStateUsing(function (?array $state): string {
                        if (! $state) {
                            return '—';
                        }

                        return collect($state)
                            ->reject(fn ($v, $k) => in_array($k, ['_token', 'website']) || $v === null || $v === '')
                            ->map(fn ($v, $k) => ucfirst(str_replace('_', ' ', $k)).': '.$v)
                            ->take(3)
                            ->implode(', ');
                    })
                    ->limit(60)
                    ->toggleable(),
                TextColumn::make('ip_address')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('When')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
