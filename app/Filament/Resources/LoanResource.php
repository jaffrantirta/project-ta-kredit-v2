<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Loan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('customer.name')->label('Nama Nasabah')->disabled(),
                Forms\Components\TextInput::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Forms\Components\TextInput::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')->label('Nama Nasabah'),
                Tables\Columns\TextColumn::make('amount')->label('Jumlah Pinjaman')->numeric()->prefix('Rp. '),
                Tables\Columns\TextColumn::make('duration')->label('Durasi Pinjaman')->suffix(' Bulan'),
                Tables\Columns\TextColumn::make('purpose')->label('Tujuan Pinjaman'),
                Tables\Columns\TextColumn::make('status.name')->label('Status'),
                Tables\Columns\TextColumn::make('final_score')->label('Nilai akhir'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
            ])
            ->filters([
                //
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
            // RelationManagers\LoanWeightRelationManager::class,
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
