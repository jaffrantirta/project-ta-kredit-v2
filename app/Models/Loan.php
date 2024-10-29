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
    public function loanWeights(): HasMany
    {
        return $this->hasMany(LoanWeight::class, 'loan_id');
    }
}
