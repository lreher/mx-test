<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class BaseFormRequest extends FormRequest
{

    public function validateResolved()
    {
        $this->sanitize(parent::all());

        parent::validateResolved();
    }

    /**
     * Lets get rid of any Xss nonsense, 
     */
    private function sanitize(Array $inputs)
    {
        foreach($inputs as $i => $item){
            $inputs[$i] = strip_tags($item);
        }

        $this->replace($inputs);

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
}