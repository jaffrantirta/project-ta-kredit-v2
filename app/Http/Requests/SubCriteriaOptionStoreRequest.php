<?php

namespace App\Http\Requests;

use App\Models\SubCriteriaOption;
use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaOptionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', SubCriteriaOption::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
