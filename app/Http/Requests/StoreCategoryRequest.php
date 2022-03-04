<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|min:3|max:250',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kategoriyani kiriting!',
            'name.unique' => 'Bu kategoriyani mavjud!',
            'name.min' => 'Kategoriyani 3 ta belgidan iborat bo\'lishi kerak!',
            'name.max' => 'Kategoriyani 250 ta belgidan ko\'p bo\'lishi kerak emas!',
        ];
    }
}
