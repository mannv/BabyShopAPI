<?php

namespace App\Http\Requests;

use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class MyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationHttpException($validator->errors()));
    }
}
