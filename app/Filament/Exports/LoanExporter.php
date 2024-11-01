<?php

namespace App\Filament\Exports;

use App\Models\Loan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class LoanExporter extends Exporter
{
    protected static ?string $model = Loan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('purpose'),
            ExportColumn::make('description'),
            ExportColumn::make('amount'),
            ExportColumn::make('duration'),
            ExportColumn::make('customer.name'),
            ExportColumn::make('status.name'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('final_score'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your loan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
