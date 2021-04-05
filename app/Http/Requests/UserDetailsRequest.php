<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserDetailsRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'phone_number' => [
                'sometimes',
                'digits:10'
            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'phone_number.required' => "Your phone number must be 10 digits.",
        ];
    }

}