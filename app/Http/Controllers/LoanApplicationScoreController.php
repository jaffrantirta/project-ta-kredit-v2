<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanApplicationScoreStoreRequest;
use App\Http\Requests\LoanApplicationScoreUpdateRequest;
use App\Models\LoanApplicationScore;
use App\Queries\LoanApplicationScoreQuery;

class LoanApplicationScoreController extends Controller
{
    public function index(LoanApplicationScoreQuery $loanapplicationscoreQuery)
    {
        return $loanapplicationscoreQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(LoanApplicationScoreStoreRequest $request)
    {
        return LoanApplicationScore::create($request->validated());
    }

    public function show($loanapplicationscore, LoanApplicationScoreQuery $query)
    {
        return $query->includes()->findAndAppend($loanapplicationscore);
    }

    public function update(LoanApplicationScoreUpdateRequest $request, LoanApplicationScore $loanapplicationscore)
    {
        $loanapplicationscore->update($request->validated());
        return $loanapplicationscore;
    }

    public function destroy(LoanApplicationScore $loanapplicationscore)
    {
        $loanapplicationscore->delete();
        return response()->noContent();
    }
}
