<?php

namespace App\Filament\Resources\LoanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use App\Models\LoanApplicationScore;

class LoanApplicationScoresRelationManager extends RelationManager
{
    protected static string $relationship = 'loan_application_scores';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sub_criteria_id')
                    ->options(\App\Models\SubCriteria::all()->pluck('name', 'id'))
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('sub_criteria_option_id')
                    ->options(function (callable $get) {
                        $subCriteriaId = $get('sub_criteria_id');
                        return \App\Models\SubCriteriaOption::where('sub_criteria_id', $subCriteriaId)->pluck('option_description', 'id');
                    })
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('sub_criteria_option_name', \App\Models\SubCriteriaOption::find($state)->option_description))
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('score', \App\Models\SubCriteriaOption::find($state)->score))
                    ->searchable(),
                Forms\Components\TextInput::make('sub_criteria_option_name')
                    ->required()
                    ->readOnly(),
                Forms\Components\TextInput::make('score')
                    ->required()
                    ->readOnly(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('score')
            ->columns([
                Tables\Columns\TextColumn::make('sub_criteria.name'),
                Tables\Columns\TextColumn::make('sub_criteria_option_name'),
                Tables\Columns\TextColumn::make('score'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->using(function (array $data) {
                        // Add the `loan_id` here dynamically
                        $loanId = $this->ownerRecord->id;

                        // Update or create record based on `loan_id` and `sub_criteria_id`
                        return LoanApplicationScore::updateOrCreate(
                            [
                                'loan_id' => $loanId,
                                'sub_criteria_id' => $data['sub_criteria_id'],
                            ],
                            [
                                'sub_criteria_option_id' => $data['sub_criteria_option_id'],
                                'sub_criteria_option_name' => $data['sub_criteria_option_name'],
                                'score' => $data['score'],
                            ]
                        );
                    }),
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
