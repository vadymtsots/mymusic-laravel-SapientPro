<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserProfileRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|email:rfc,dns',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ];
    }
}
