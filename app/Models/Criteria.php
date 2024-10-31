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
     * Get all of the sub_criterias for the Criteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_criterias(): HasMany
    {
        return $this->hasMany(SubCriteria::class);
    }
}
