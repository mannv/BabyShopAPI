<?php

namespace App\Http\Requests;

class UserCreateRequest extends MyRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32|confirmed',
            'password_confirmation' => 'required|min:6|max:32',
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Ten'
//        ];
//    }
}
