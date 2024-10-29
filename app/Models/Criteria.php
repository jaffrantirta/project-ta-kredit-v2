<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    /** @use HasFactory<\Database\Factories\CriteriaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'weight'
    ];

    /**
     * Get all of the loanEvaluateAlternatives for the Criteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_evaluate_alternatives(): HasMany
    {
        return $this->hasMany(LoanEvaluateAlternatives::class);
    }

    /**
     * Get all of the normalizations for the Criteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_normalizations(): HasMany
    {
        return $this->hasMany(LoanNormalization::class);
    }

    /**
     * Get all of the weights for the Criteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_weights(): HasMany
    {
        return $this->hasMany(LoanWeight::class);
    }
}
