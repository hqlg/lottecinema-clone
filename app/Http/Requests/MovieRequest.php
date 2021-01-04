<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        $STR = 'required|string';
        return [
            'cinema_id' => 'required|numeric',
            'name' => 'required|string',
            'img_url' => $STR,
            'release_date' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'movie_url' => $STR,
        ];
    }
}
