<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeveloperRequest extends FormRequest
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
            'name' => 'required|unique:developers|min:3|max:250',
            'born_date' => 'required|date',
            'phone_number' => 'required|min:5|max:15',
            'type_id' => 'required',
            'address' => 'required',
            'region_id' => 'required',
            'state_id' => 'required',
            'passport' => 'required',
            'family' => 'required',
            'developer_photo' => 'required',
            'longitude' => 'nullable',
            'latitude' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ismni kiriting!',
            'name.unique' => 'Ism taklif qilinadi!',
            'name.min' => 'Ismni 3 ta belgidan iborat bo\'lishi kerak!',
            'name.max' => 'Ism 250 ta belgidan ko\'p bo\'lishi kerak emas!',
            'born_date.required' => 'Tug\'ilgan sanani kiriting!',
            'born_date.date' => 'Tug\'ilgan sana sana bo\'lishi kerak!',
            'phone_number.required' => 'Telefon raqamini kiriting!',
            'phone_number.min' => 'Telefon raqamini 5 ta belgidan iborat bo\'lishi kerak!',
            'phone_number.max' => 'Telefon raqamini 15 ta belgidan ko\'p bo\'lishi kerak emas!',
            'type_id.required' => 'Yo\'nalish turini kiriting!',
            'address.required' => 'Manzilni kiriting!',
            'region_id.required' => 'Regionni kiriting!',
            'state_id.required' => 'Viloyatni kiriting!',
            'passport.required' => 'Passportni kiriting!',
            'family.required' => 'Familiyani kiriting!',
            'developer_photo.required' => 'Foto kiriting!',
            'latitude.required' => 'Kordinatani kiriting!',
        ];
    }
}
