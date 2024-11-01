<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use App\Models\Loan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class CustomerOwnLoan extends BaseWidget
{
    public static function canView(): bool
    {
        return Auth::check() && Auth::user()->hasRole('customer');
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Loan::query()->where('customer_id', Auth::user()->customer->id)
            )
            ->columns([
                Tables\Columns\TextColumn::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Tables\Columns\TextColumn::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
                Tables\Columns\TextColumn::make('purpose')->label('Tujuan Pinjaman'),
                Tables\Columns\TextColumn::make('status.name')
                    ->label('Status')
                    ->default('Verifikasi')
                    ->getStateUsing(fn ($record): ?string => $record->status?->name ?? 'Verifikasi'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat pada')->date(),
            ]);
    }
}
