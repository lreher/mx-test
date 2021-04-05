<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;

class AddressRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'address_1' => [
                'required',
            ],
            'suburb' => [
                'required',
            ],
            'state' => [
                'required',
            ],
            'postcode' => [
                'required',
            ],
            'country' => [
                'required',
            ],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'address_1.required' => "First line of address is required",
            'suburb.required' => "Suburb is required",
            'state.required' => "State is required",
            'postcode.required' => "Postcode is required",
            'country.required' => "Country is required"
        ];
    }

}