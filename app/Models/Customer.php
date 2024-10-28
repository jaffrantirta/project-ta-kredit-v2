<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'nik',
        'phone',
        'birthday',
        'birthplace',
        'gender',
        'address',
        'other_address',
        'occupation',
    ];

    /**
     * Get all of the loans for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
