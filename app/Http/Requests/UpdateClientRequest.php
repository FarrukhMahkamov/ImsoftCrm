<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
           'general_info' => 'required', 
           'enterprise_name' => 'required', 
           'category_id' => 'required', Rule::exists('categories', 'id'), 
           'activity_type_id' => 'required', Rule::exists('activity_types', 'id'), 
           'state_id' => 'required', Rule::exists('states', 'id'), 
           'region_id' => 'required', Rule::exists('regions', 'id'),  
           'address_id' => 'required', Rule::exists('addresses', 'id'), 
           'home_address' => 'required', 
           'client_name' => 'required', 
           'client_phone_number' => 'required', 
           'client_phone_number_2' => 'required', 
           'client_born_date' => 'required', 
           'operator_id' => 'required', Rule::exists('addresses', 'id'), 
           'operator_phone_number' => 'required', 
           'operator_phone_number_2' => 'required', 
           'operator_born_date' => 'required', 
           'latitude' => 'required', 
           'longtitude' => 'required', 
           'file' => 'required', 
           'type_id' => 'required', Rule::exists('types', 'id'), 
           'order_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'enterprise_name.required' => 'Korxano nomini kiriting!',
            'enterprise_name.min' => 'Korxano nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'enterprise_name.max' => 'Korxano nomi 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'category_id.required' => 'Kategoriyani tanlang!',
            'category_id.exists' => 'Kategoriya mavjud emas!',
            'activity_type_id.required' => 'Yo\'nalish turini tanlang!',
            'activity_type_id.exists' => 'Yo\'nalish turi mavjud emas!',
            'state_id.required' => 'Viloyatni tanlang!',
            'state_id.exists' => 'Viloyat mavjud emas!',
            'region_id.required' => 'Tumanni tanlang!',
            'region_id.exists' => 'Tuman mavjud emas!',
            'address_id.required' => 'Manzilni tanlang!',
            'address_id.exists' => 'Manzil mavjud emas!',
            'home_address.required' => 'Manzilni kiriting!',
            'home_address.min' => 'Manzil 3 ta harfdan kattaroq bo\'lishi shart',
            'home_address.max' => 'Manzil 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'order_reason.required' => 'Kelish uchun sababi kiriting!',
            'client_name.required' => 'Mijoz nomini kiriting!',
            'client_name.min' => 'Mijoz nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'client_name.max' => 'Mijoz nomi 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'client_phone_number.required' => 'Mijoz telefon raqamini kiriting!',
            'client_phone_number.min' => 'Mijoz telefon raqami 3 ta harfdan kattaroq bo\'lishi shart',
            'client_phone_number.max' => 'Mijoz telefon raqami 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'client_born_date.date' => 'Mijoz yoshi kiriting!',
            'operator_name.required' => 'Operator nomini kiriting!',
            'operator_name.min' => 'Operator nomi 3 ta harfdan kattaroq bo\'lishi shart',
            'operator_name.max' => 'Operator nomi 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'operator_phone_number.required' => 'Operator telefon raqamini kiriting!',
            'operator_phone_number.min' => 'Operator telefon raqami 3 ta harfdan kattaroq bo\'lishi shart',
            'operator_phone_number.max' => 'Operator telefon raqami 250 ta harfdan kattaroq bo\'lishi kerak emas',
            'operator_born_date.date' => 'Operator yoshi kiriting!',
            'latitude.numeric' => 'Kordinatni kiriting!',
            'client_status.required' => 'Mijoz holati kiriting!',
            'order_time.date' => 'Kelish vaqtini kiriting!',
            'file_1.required' => 'Rasmni kiriting!',
        ];
    }
}
