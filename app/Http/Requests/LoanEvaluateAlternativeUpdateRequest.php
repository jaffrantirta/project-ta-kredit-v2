<?php

namespace App\Http\Requests;

use App\Models\LoanEvaluateAlternative;
use Illuminate\Foundation\Http\FormRequest;

class LoanEvaluateAlternativeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('loanevaluatealternative'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
