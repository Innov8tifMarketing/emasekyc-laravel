<?php

namespace App\Filament\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('company')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('original_source')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'landing_page' => 'info',
                        'contact_form' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('activities_count')
                    ->counts('activities')
                    ->label('Activities')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('original_source')
                    ->options([
                        'landing_page' => 'Landing Page',
                        'contact_form' => 'Contact Form',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->headerActions([
                Action::make('export_csv')
                    ->label('Export CSV')
                    ->action(function (): StreamedResponse {
                        return self::exportCsv();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    private static function exportCsv(): StreamedResponse
    {
        $leads = Lead::withCount('activities')
            ->with(['activities' => fn ($q) => $q->select('lead_id', 'created_at')->orderBy('created_at')])
            ->orderByDesc('created_at')
            ->get();

        return response()->streamDownload(function () use ($leads) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Email', 'First Name', 'Last Name', 'Phone', 'Company', 'Source', 'Activities', 'First Activity', 'Last Activity', 'Created At']);

            foreach ($leads as $lead) {
                $activities = $lead->activities;
                fputcsv($handle, [
                    $lead->email,
                    $lead->first_name,
                    $lead->last_name,
                    $lead->phone,
                    $lead->company,
                    $lead->original_source,
                    $lead->activities_count,
                    $activities->last()?->created_at?->toDateTimeString(),
                    $activities->first()?->created_at?->toDateTimeString(),
                    $lead->created_at->toDateTimeString(),
                ]);
            }

            fclose($handle);
        }, 'leads-'.now()->format('Y-m-d').'.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
