<?php

namespace App\Http\Requests;

use App\Models\LoanWeight;
use Illuminate\Foundation\Http\FormRequest;

class LoanWeightUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('loanweight'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
