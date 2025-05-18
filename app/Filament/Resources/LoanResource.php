<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Loan;
use App\Models\Status;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    protected static ?string $navigationLabel = 'Pinjaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Forms\Components\TextInput::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
                Forms\Components\TextInput::make('purpose')->label('Tujuan Pinjaman')->required(),
                Forms\Components\TextInput::make('description')->label('Deskripsi')->required(),
                Forms\Components\TextInput::make('final_score')->label('Nilai Akhir')->numeric()->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')->label('Nama Nasabah')->searchable(),
                Tables\Columns\TextColumn::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Tables\Columns\TextColumn::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
                Tables\Columns\TextColumn::make('purpose')->label('Tujuan Pinjaman'),
                Tables\Columns\TextColumn::make('status.name')
                    ->label('Status')
                    ->default('Verifikasi')
                    ->getStateUsing(fn($record): ?string => $record->status?->name ?? 'Verifikasi'),
                Tables\Columns\TextColumn::make('final_score')->label('Nilai akhir')->numeric(),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat pada')->date(),
            ])
            ->filters([
                SelectFilter::make('status_id')
                    ->label('Status')
                    ->options(
                        Status::all()->pluck('name', 'id')
                    )
                    ->attribute('status_id'),
                Filter::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal')
                            ->default(now()->subMonth()),  // Default to one month ago
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal')
                            ->default(now()),  // Default to today
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date) => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date) => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LoanApplicationScoresRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}
