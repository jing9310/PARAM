<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required',
            'password' => 'required|min:8',
            'kana' => 'required|max:20',
            'nickname' => 'required|max:20',
            'gender' => 'required|integer',
            'birthday' => 'required|date',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'active' => 'required|integer',
            'place_id' => 'required|integer',
            'sport_id' => 'required|integer',
        ];
    }
}
