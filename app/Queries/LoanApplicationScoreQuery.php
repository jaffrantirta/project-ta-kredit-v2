<?php

namespace App\Queries;

use App\Models\LoanApplicationScore;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Jaffran\LaravelTools\Queries\PaginatedQuery;

class LoanApplicationScoreQuery extends PaginatedQuery
{
    public function __construct()
    {
        parent::__construct(LoanApplicationScore::query());
    }

    protected array $append = [
       //'phone',
    ];

    protected string $adminPermission = 'loanapplicationscore.view-sensitive-data';

    protected function getAllowedSorts(): array
    {
        return [
            //AllowedSort::field('created_at'),
        ];
    }

    protected function getAllowedFilters(): array
    {
        return [
            //AllowedFilter::partial('name'),
        ];
    }

    protected function getAllowedIncludes(): array
    {
        return [
            //AllowedInclude::relationship('user'),
        ];
    }
}