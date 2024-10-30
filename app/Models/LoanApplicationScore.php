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
        'customer_id',
        'sub_criteria_id',
        'score',
    ];

    /**
     * Get the customer that owns the LoanApplicationScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
