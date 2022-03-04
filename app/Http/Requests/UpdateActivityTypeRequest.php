<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityTypeRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Faoliyat turini kiriting!',
            'name.min' => 'Faoliyat turi 3 ta belgidan iborat bo\'lishi kerak!',
            'name.max' => 'Faoliyat turi 250 ta belgidan ko\'p bo\'lishi kerak emas!',
            'category_id.required' => 'Kategoriyani kiriting!',
            'category_id.exists' => 'Bu kategoriya mavjud emas!',
            ];
    }
}
