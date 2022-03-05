<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegionRequest extends FormRequest
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
            'name' => 'required|unique:regions|min:3|max:250',
            'state_id' => 'required|exists:states,id',   
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Shahar nomini kiriting!',
            'name.unique' => 'Bu shahar mavjud!',
            'name.min' => 'Shahar nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'name.max' => 'Shahar nomi 250 ta harfdan kattaroq bo\'lishi shart',
            'state_id.required' => 'Viloyatni tanlang!',
            'state_id.exists' => 'Viloyat mavjud emas!',
        ];
    }
}
