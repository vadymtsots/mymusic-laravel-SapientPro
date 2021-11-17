<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|email:rfc,dns',
            'password' => [
                'required_with:password_confirmation',
                'regex:/^(?=.+[a-z])(?=.+[A-Z])(?=.+[0-9])[a-zA-Z0-9]{6,}$/'
            ],
            'password_confirmation' => 'required|same:password',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ];
    }
}
