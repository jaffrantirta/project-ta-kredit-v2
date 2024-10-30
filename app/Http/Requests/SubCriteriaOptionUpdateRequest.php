<?php

namespace App\Http\Requests;

use App\Models\SubCriteriaOption;
use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaOptionUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('subcriteriaoption'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
