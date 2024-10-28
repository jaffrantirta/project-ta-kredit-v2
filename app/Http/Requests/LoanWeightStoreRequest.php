<?php

namespace App\Http\Requests;

use App\Models\LoanWeight;
use Illuminate\Foundation\Http\FormRequest;

class LoanWeightStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', LoanWeight::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
