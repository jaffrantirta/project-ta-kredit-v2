<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanNormalizationStoreRequest;
use App\Http\Requests\LoanNormalizationUpdateRequest;
use App\Models\LoanNormalization;
use App\Queries\LoanNormalizationQuery;

class LoanNormalizationController extends Controller
{
    public function index(LoanNormalizationQuery $loannormalizationQuery)
    {
        return $loannormalizationQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(LoanNormalizationStoreRequest $request)
    {
        return LoanNormalization::create($request->validated());
    }

    public function show($loannormalization, LoanNormalizationQuery $query)
    {
        return $query->includes()->findAndAppend($loannormalization);
    }

    public function update(LoanNormalizationUpdateRequest $request, LoanNormalization $loannormalization)
    {
        $loannormalization->update($request->validated());
        return $loannormalization;
    }

    public function destroy(LoanNormalization $loannormalization)
    {
        $loannormalization->delete();
        return response()->noContent();
    }
}
