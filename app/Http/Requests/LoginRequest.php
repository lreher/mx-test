<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'login' => [
                'required',
            ],
            'password' => [
                'required',
            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'login.required' => "You must enter a valid email or username",
            'password.required' => "You must enter a password",
        ];
    }

}