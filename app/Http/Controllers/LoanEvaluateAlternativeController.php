<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanEvaluateAlternativeStoreRequest;
use App\Http\Requests\LoanEvaluateAlternativeUpdateRequest;
use App\Models\LoanEvaluateAlternative;
use App\Queries\LoanEvaluateAlternativeQuery;

class LoanEvaluateAlternativeController extends Controller
{
    public function index(LoanEvaluateAlternativeQuery $loanevaluatealternativeQuery)
    {
        return $loanevaluatealternativeQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(LoanEvaluateAlternativeStoreRequest $request)
    {
        return LoanEvaluateAlternative::create($request->validated());
    }

    public function show($loanevaluatealternative, LoanEvaluateAlternativeQuery $query)
    {
        return $query->includes()->findAndAppend($loanevaluatealternative);
    }

    public function update(LoanEvaluateAlternativeUpdateRequest $request, LoanEvaluateAlternative $loanevaluatealternative)
    {
        $loanevaluatealternative->update($request->validated());
        return $loanevaluatealternative;
    }

    public function destroy(LoanEvaluateAlternative $loanevaluatealternative)
    {
        $loanevaluatealternative->delete();
        return response()->noContent();
    }
}
