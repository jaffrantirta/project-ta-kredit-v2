<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoansRelationManager extends RelationManager
{
    protected static string $relationship = 'loans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah Pinjaman')
                    ->required()
                    ->numeric()
                    ->maxLength(10),
                Forms\Components\TextInput::make('duration')
                    ->label('Durasi (bulan)')
                    ->required()
                    ->numeric()
                    ->maxLength(3),
                Forms\Components\TextInput::make('purpose')
                    ->label('Tujuan Pinjaman')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('purpose')
            ->columns([
                Tables\Columns\TextColumn::make('purpose')->label('Tujuan Pinjaman'),
                Tables\Columns\TextColumn::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Tables\Columns\TextColumn::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('status.name')
                    ->label('Status')
                    ->default('Verifikasi')
                    ->getStateUsing(fn ($record): ?string => $record->status?->name ?? 'Verifikasi'),
                Tables\Columns\TextColumn::make('created_at')->label('Dubuat pada')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('editloan')
                    ->label('Edit')
                    ->url(fn ($record) => url("/admin/loans/{$record->id}/edit")),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
