<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CriteriaResource\Pages;
use App\Filament\Resources\CriteriaResource\RelationManagers;
use App\Models\Criteria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CriteriaResource extends Resource
{
    protected static ?string $model = Criteria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kriteria';

    public static function canViewAny(): bool
    {
        return auth()->user()->can('criteria.viewAny');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama kriteria')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight')
                    ->label('Bobot kriteria (%)')
                    ->helperText('Nilai bobot kriteria harus antara 0 sampai 100. Contoh: input "50" yang berarti 50%')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kriteria')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->label('Bobot Kriteria')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriterias::route('/'),
            'create' => Pages\CreateCriteria::route('/create'),
            'edit' => Pages\EditCriteria::route('/{record}/edit'),
        ];
    }
}
