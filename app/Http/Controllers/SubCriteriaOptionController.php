<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCriteriaOptionStoreRequest;
use App\Http\Requests\SubCriteriaOptionUpdateRequest;
use App\Models\SubCriteriaOption;
use App\Queries\SubCriteriaOptionQuery;

class SubCriteriaOptionController extends Controller
{
    public function index(SubCriteriaOptionQuery $subcriteriaoptionQuery)
    {
        return $subcriteriaoptionQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(SubCriteriaOptionStoreRequest $request)
    {
        return SubCriteriaOption::create($request->validated());
    }

    public function show($subcriteriaoption, SubCriteriaOptionQuery $query)
    {
        return $query->includes()->findAndAppend($subcriteriaoption);
    }

    public function update(SubCriteriaOptionUpdateRequest $request, SubCriteriaOption $subcriteriaoption)
    {
        $subcriteriaoption->update($request->validated());
        return $subcriteriaoption;
    }

    public function destroy(SubCriteriaOption $subcriteriaoption)
    {
        $subcriteriaoption->delete();
        return response()->noContent();
    }
}
