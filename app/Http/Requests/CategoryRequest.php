<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'categoryName' =>'unique:product_categories,category_name',
            'category_name' =>'unique:product_categories,category_name',
        ];
    }
    public function messages()
    {
        return [
            'category_name'   =>'Category Name Exists',

        ];
    }
}
