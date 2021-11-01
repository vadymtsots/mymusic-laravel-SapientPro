<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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

                'user_id' => 'required|exists:App\Models\User,id',
                'artist_id' => 'required|exists:App\Models\Artist,id',
                'album_id' => 'required|exists:App\Models\Album,id',
                'review_body' => 'required|max:1000',
                'rating' => 'required|numeric|between:1,10'

        ];
    }
}
