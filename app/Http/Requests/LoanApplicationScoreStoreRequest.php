<?php

namespace App\Http\Requests;

use App\Models\LoanApplicationScore;
use Illuminate\Foundation\Http\FormRequest;

class LoanApplicationScoreStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', LoanApplicationScore::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
