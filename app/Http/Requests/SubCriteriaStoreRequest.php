<?php

namespace App\Http\Requests;

use App\Models\SubCriteria;
use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', SubCriteria::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
