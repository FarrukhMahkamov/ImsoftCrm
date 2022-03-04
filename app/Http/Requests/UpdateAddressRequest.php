<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'region_id' => 'required', Rule::exists('regions', 'id'),
            'state_id' => 'required', Rule::exists('states', 'id'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Manzil nomini kiriting!',
            'region_id.required' => 'Regionni kiriting!',
            'region_id.exists' => 'Bu region mavjud emas!',
            'state_id.required' => 'Viloyatni kiriting!',
            'state_id.exists' => 'Bu viloyat mavjud emas!',
        ];
    }

}
