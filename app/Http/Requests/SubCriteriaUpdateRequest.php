<?php

namespace App\Http\Requests;

use App\Models\SubCriteria;
use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('subcriteria'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
