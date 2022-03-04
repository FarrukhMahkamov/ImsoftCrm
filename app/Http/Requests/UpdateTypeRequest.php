<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'name' => 'required|min:3|max:250',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ma\'lumotni kiriting!',
            'name.min' => 'Ma\'lumot nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'name.max' => 'Ma\'lumot nomi 250 ta harfdan kamroq bo\'lishi shart',
        ];
    }
}
