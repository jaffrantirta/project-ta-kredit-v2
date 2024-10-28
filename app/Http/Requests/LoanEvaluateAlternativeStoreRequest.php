<?php

namespace App\Http\Requests;

use App\Models\LoanEvaluateAlternative;
use Illuminate\Foundation\Http\FormRequest;

class LoanEvaluateAlternativeStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', LoanEvaluateAlternative::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
