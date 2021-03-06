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
                'name' => 'required|string',
                'birthDate' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'image' => 'sometimes|image|mimes:png,jpg,jpeg|max:10000|dimensions:min_width=100,min_height=100,max_height=500,max_width=500',
        ];
    }
}
