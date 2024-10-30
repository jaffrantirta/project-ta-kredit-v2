<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCriteria extends Model
{
    /** @use HasFactory<\Database\Factories\SubCriteriaFactory> */
    use HasFactory;

    protected $fillable = [
        'criteria_id',
        'name',
        'weight',
    ];

    /**
     * Get all of the options for the SubCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(SubCriteriaOption::class);
    }

    /**
     * Get the criteria that owns the SubCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }

}
