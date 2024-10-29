<?php

namespace App\Filament\Resources\LoanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanWeightsRelationManager extends RelationManager
{
    protected static string $relationship = 'loanWeights';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('criteria_id')
                    ->label('Kriteria')
                    ->options(\App\Models\Criteria::all()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')
                    ->label('Nilai')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('value')
            ->columns([
                Tables\Columns\TextColumn::make('criteria.name')->label('Kriteria'),
                Tables\Columns\TextColumn::make('value')->label('Nilai')->numeric(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
