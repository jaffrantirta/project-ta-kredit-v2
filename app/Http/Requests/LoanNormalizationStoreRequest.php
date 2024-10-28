<?php

namespace App\Http\Requests;

use App\Models\LoanNormalization;
use Illuminate\Foundation\Http\FormRequest;

class LoanNormalizationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', LoanNormalization::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
