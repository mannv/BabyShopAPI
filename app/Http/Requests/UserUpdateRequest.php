<?php

namespace App\Http\Requests;

class UserUpdateRequest extends MyRequest
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
            'locale' => 'required|in:en,vi,jp'
        ];
    }
}
