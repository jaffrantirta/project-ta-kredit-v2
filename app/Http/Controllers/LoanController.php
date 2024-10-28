<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanStoreRequest;
use App\Http\Requests\LoanUpdateRequest;
use App\Models\Loan;
use App\Queries\LoanQuery;

class LoanController extends Controller
{
    public function index(LoanQuery $loanQuery)
    {
        return $loanQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(LoanStoreRequest $request)
    {
        return Loan::create($request->validated());
    }

    public function show($loan, LoanQuery $query)
    {
        return $query->includes()->findAndAppend($loan);
    }

    public function update(LoanUpdateRequest $request, Loan $loan)
    {
        $loan->update($request->validated());
        return $loan;
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return response()->noContent();
    }
}
