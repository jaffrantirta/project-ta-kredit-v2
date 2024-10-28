<?php

namespace App\Http\Requests;

use App\Models\Loan;
use Illuminate\Foundation\Http\FormRequest;

class LoanStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', Loan::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
