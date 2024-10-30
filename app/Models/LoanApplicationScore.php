<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanApplicationScore extends Model
{
    /** @use HasFactory<\Database\Factories\LoanApplicationScoreFactory> */
    use HasFactory;


    protected $fillable = [
        'loan_id',
        'sub_criteria_id',
        'score',
        'sub_criteria_option_name',
    ];

    /**
     * Get the loan that owns the LoanApplicationScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Get the sub_criteria that owns the LoanApplicationScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_criteria(): BelongsTo
    {
        return $this->belongsTo(SubCriteria::class);
    }
}
