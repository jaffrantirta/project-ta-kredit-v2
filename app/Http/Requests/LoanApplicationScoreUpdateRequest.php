<?php

namespace App\Http\Requests;

use App\Models\LoanApplicationScore;
use Illuminate\Foundation\Http\FormRequest;

class LoanApplicationScoreUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('loanapplicationscore'));
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
