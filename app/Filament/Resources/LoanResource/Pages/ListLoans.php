<?php
namespace App\Filament\Resources\LoanResource\Pages;

use App\Filament\Resources\LoanResource;
use App\Models\Loan;
use App\Models\LoanApplicationScore;
use App\Models\SubCriteria;
use App\Models\Criteria;
use App\Models\Status;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class ListLoans extends ListRecords
{
    protected static string $resource = LoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('calculate-saw')
                ->label('Calculate SAW')
                ->action('calculateSAW'),
        ];
    }

    public function calculateSAW()
    {
        // Step 1: Normalize scores for each sub-criterion
        $normalizedScores = LoanApplicationScore::select(
                'loan_id',
                'sub_criteria_id',
                DB::raw('score / MAX(score) OVER (PARTITION BY sub_criteria_id) AS normalized_score')
            )
            ->get()
            ->groupBy(['loan_id', 'sub_criteria_id']);


        // Step 2: Calculate weighted score for each sub-criterion
        $weightedScores = [];
        foreach ($normalizedScores as $loanId => $subCriteriaScores) {
            foreach ($subCriteriaScores as $subCriteriaId => $scores) {
                $subCriteria = SubCriteria::find($subCriteriaId);
                $weight = $subCriteria->weight ?? 1; // Default weight to 1 if not set

                $weightedScores[$loanId][$subCriteriaId] = $scores->first()->normalized_score * $weight;
            }
        }


        // Step 3: Sum up weighted scores for each major criterion
        $criteriaScores = [];
        foreach ($weightedScores as $loanId => $subCriteriaScores) {
            foreach ($subCriteriaScores as $subCriteriaId => $weightedScore) {
                $subCriteria = SubCriteria::find($subCriteriaId);
                $criteriaId = $subCriteria->criteria_id;

                if (!isset($criteriaScores[$loanId][$criteriaId])) {
                    $criteriaScores[$loanId][$criteriaId] = 0;
                }

                $criteriaScores[$loanId][$criteriaId] += $weightedScore;
            }
        }


        // Step 4: Calculate the maximum possible score
        $maxScore = 0;
        foreach (Criteria::all() as $criteria) {
            $criteriaWeight = $criteria->weight ?? 1;
            $maxScore += $criteriaWeight; // Sum of all criteria weights
        }

        // Step 5: Calculate the final score for each loan application, scaled to a maximum of 100
        $finalScores = [];
        foreach ($criteriaScores as $loanId => $scoresByCriteria) {
            $finalScore = 0;

            foreach ($scoresByCriteria as $criteriaId => $criteriaScore) {
                $criteria = Criteria::find($criteriaId);
                $criteriaWeight = $criteria->weight ?? 1;

                $finalScore += $criteriaScore * $criteriaWeight;
            }

            // Scale final score to a maximum of 100
            $finalScores[$loanId] = ($finalScore / $maxScore);
        }

        // Step 6: Retrieve all statuses and sort by minimum_value descending
        $statuses = Status::orderByDesc('minimum_value')->get();

        // Step 7: Assign final score and status based on minimum_value threshold
        foreach ($finalScores as $loanId => $score) {
            $statusId = null;

            // Find the highest status that the score qualifies for
            foreach ($statuses as $status) {
                if ($score >= $status->minimum_value) {
                    $statusId = $status->id;
                    break;
                }
            }

            // Update the loan record with the final score and status
            Loan::where('id', $loanId)->update([
                'final_score' => $score,
                'status_id' => $statusId,
            ]);
        }

        Notification::make()
            ->title('Perhitungan selesai')
            ->success()
            ->send();
    }
}
