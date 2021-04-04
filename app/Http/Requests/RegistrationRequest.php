<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegistrationRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
        ];

        return $rules;
    }

}