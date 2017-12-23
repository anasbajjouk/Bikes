<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'name' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'overview' => 'required',
                'price' => 'required|numeric|between:0.99,3999.99',
                'color' => 'required',
                'size' => 'required',
                'information' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:10000|dimensions:min_width=500,min_height=700,max_height=750,max_width=550',
        ];
    }
}
