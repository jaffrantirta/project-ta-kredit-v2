<?php

namespace App\Http\Requests;

use App\Models\LoanNormalization;
use Illuminate\Foundation\Http\FormRequest;

class LoanNormalizationUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('loannormalization'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
