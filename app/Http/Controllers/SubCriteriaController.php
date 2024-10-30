<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCriteriaStoreRequest;
use App\Http\Requests\SubCriteriaUpdateRequest;
use App\Models\SubCriteria;
use App\Queries\SubCriteriaQuery;

class SubCriteriaController extends Controller
{
    public function index(SubCriteriaQuery $subcriteriaQuery)
    {
        return $subcriteriaQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(SubCriteriaStoreRequest $request)
    {
        return SubCriteria::create($request->validated());
    }

    public function show($subcriteria, SubCriteriaQuery $query)
    {
        return $query->includes()->findAndAppend($subcriteria);
    }

    public function update(SubCriteriaUpdateRequest $request, SubCriteria $subcriteria)
    {
        $subcriteria->update($request->validated());
        return $subcriteria;
    }

    public function destroy(SubCriteria $subcriteria)
    {
        $subcriteria->delete();
        return response()->noContent();
    }
}
