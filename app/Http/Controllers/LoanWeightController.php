<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanWeightStoreRequest;
use App\Http\Requests\LoanWeightUpdateRequest;
use App\Models\LoanWeight;
use App\Queries\LoanWeightQuery;

class LoanWeightController extends Controller
{
    public function index(LoanWeightQuery $loanweightQuery)
    {
        return $loanweightQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(LoanWeightStoreRequest $request)
    {
        return LoanWeight::create($request->validated());
    }

    public function show($loanweight, LoanWeightQuery $query)
    {
        return $query->includes()->findAndAppend($loanweight);
    }

    public function update(LoanWeightUpdateRequest $request, LoanWeight $loanweight)
    {
        $loanweight->update($request->validated());
        return $loanweight;
    }

    public function destroy(LoanWeight $loanweight)
    {
        $loanweight->delete();
        return response()->noContent();
    }
}
