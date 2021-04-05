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
            'username' => [
                'required',
                'unique:users'
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/' // must contain at least one lowercase letter, at least one uppercase letter and at least one digit
            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => "You must enter an username",
            'username.unique' => "This username is already being used",
            'email.required' => "You must enter an email address",
            'email.email' => "Email address must be valid",
            'email.unique' => "This email address is already being used",
            'password.required' => "You must enter a password",
            'password.confirmed' => "Your passwords are not matching",
            'password.min' => "Password must be at least 6 characters long",
            'password.regex' => "Password must contain at least one lowercase letter, at least one uppercase letter and at least one digit"
        ];
    }

}