<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCriteriaOption extends Model
{
    /** @use HasFactory<\Database\Factories\SubCriteriaOptionFactory> */
    use HasFactory;

    protected $fillable = [
        'sub_criteria_id',
        'option_description',
        'score',
    ];

    /**
     * Get the subcriteria that owns the SubCriteriaOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_criteria(): BelongsTo
    {
        return $this->belongsTo(SubCriteria::class);
    }
}
