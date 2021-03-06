<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequest extends FormRequest
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
            'state_id' => 'required|exists:states,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Qo\'shimcha ma\'lumotni kiriting!',
            'name.min' => 'Region nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'name.max' => 'Region nomi 250 ta harfdan kattaroq bo\'lishi shart',
            'state_id.required' => 'Viloyatni tanlang!',
            'state_id.exists' => 'Viloyatni tanlang!',
        ];
    }
}
