<?php

namespace App\Filament\Resources\LoanResource\Pages;

use App\Filament\Resources\LoanResource;
use App\Models\Loan;
use App\Models\LoanNormalization;
use App\Models\LoanEvaluateAlternative;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListLoans extends ListRecords
{
    protected static string $resource = LoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('normalizeLoans')
                ->label('Normalize Loans')
                ->action('normalizeLoans'),

            Actions\Action::make('evaluateAlternatives')
                ->label('Evaluate Alternatives')
                ->action('evaluateAlternatives'),
        ];
    }

    public function normalizeLoans()
    {
        // Fetch loans and normalize criteria values
        $loans = Loan::with('criteria')->get();

        // Perform normalization calculation for each loan and criteria
        foreach ($loans as $loan) {
            foreach ($loan->criteria as $criteria) {
                $value = $this->normalizeValue($criteria->value); // Customize normalization logic as needed
                LoanNormalization::updateOrCreate(
                    ['loan_id' => $loan->id, 'criteria_id' => $criteria->id],
                    ['value' => $value]
                );
            }
        }

        $this->notify('success', 'Loans have been normalized successfully.');
    }

    public function evaluateAlternatives()
    {
        // Fetch loans and criteria values to calculate SAW method results
        $loans = Loan::with('criteria')->get();

        // Perform evaluation calculation for each loan
        foreach ($loans as $loan) {
            $sawScore = $this->calculateSAWScore($loan); // Implement SAW calculation logic
            LoanEvaluateAlternative::updateOrCreate(
                ['loan_id' => $loan->id],
                ['value' => $sawScore]
            );
        }

        $this->notify('success', 'Loan alternatives have been evaluated successfully.');
    }

    private function normalizeValue($value)
    {
        // Example normalization logic (implement specific logic here)
        return $value / 100; // Placeholder example
    }

    private function calculateSAWScore($loan)
    {
        // Example SAW method calculation (implement specific logic here)
        $score = 0;
        foreach ($loan->criteria as $criteria) {
            $score += $criteria->weight * $criteria->normalized_value; // Adjust calculation as needed
        }
        return $score;
    }
}
