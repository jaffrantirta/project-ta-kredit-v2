<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;


    protected $fillable = [
        'amount',
        'duration',
        'purpose',
        'description',
        'customer_id',
        'status_id',
    ];

    /**
     * Get the customer that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the loan_application_scores for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_application_scores(): HasMany
    {
        return $this->hasMany(LoanApplicationScore::class);
    }

    /**
     * Get the status that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get all of the loanWeights for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_weights(): HasMany
    {
        return $this->hasMany(LoanWeight::class);
    }

    /**
     * Get all of the weights for the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weights(): HasMany
    {
        return $this->hasMany(LoanWeight::class);
    }


}
