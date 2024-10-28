<?php

namespace App\Http\Requests;

use App\Models\Loan;
use Illuminate\Foundation\Http\FormRequest;

class LoanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('loan'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
