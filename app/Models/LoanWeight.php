<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanWeight extends Model
{
    /** @use HasFactory<\Database\Factories\LoanWeightFactory> */
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'criteria_id',
        'value',
    ];

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }
}
