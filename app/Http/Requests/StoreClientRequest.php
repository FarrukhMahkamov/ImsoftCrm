<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
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
            'general_info' => 'nullable',
            'general_document' => 'nullable',
            'enterprise_name' => 'required|min:3|max:250',
            'category_id' => 'required|exists:categories,id',
            'activity_type_id' => 'required|exists:activity_types,id',
            'state_id' => 'required|exists:states,id',
            'region_id' => 'required|exists:regions,id',
            'address_id' => 'required|exists:addresses,id',
            'home_address' => 'required|min:3|max:250',
            'order_reason' => 'required|min:3|max:250',
            'client_name' => 'required|min:3|max:250',
            'client_phone_number' => 'required|min:3|max:250',
            'client_phone_number_2' => 'nullable|min:3|max:250',
            'client_born_date' => 'nullable|date',
            'operator_name' => 'required|min:3|max:250',
            'operator_phone_number' => 'required|min:3|max:250',
            'operator_phone_number_2' => 'nullable|min:3|max:250',
            'operator_born_date' => 'nullable|date',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'file_1' => 'required',
            'file_2' => 'nullable',
            'file_3' => 'nullable',
            'type_id' => 'required|exists:types,id',
            'client_status' => 'required',
            'order_time' => 'nullable|date',
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
            'order_reason.required' => 'Qo\'shish uchun sababi kiriting!',
            'order_reason.min' => 'Malumot 3 ta harfdan kattoroq bo\'lishi shart',
            'order_reason.max' => 'Malumot 250 ta harfdan kattoroq bo\'lishi kerak emas',
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
            'latitude.numeric' => 'Koordinatni kiriting!',
            'longitude.numeric' => 'Koordinatni kiriting!',
            'type_id.required' => 'Qo\'shimcha turini tanlang!',
            'type_id.exists' => 'Qo\'shimcha turi mavjud emas!',
            'client_status.required' => 'Mijoz holati kiriting!',
            'order_time.date' => 'Qo\'shimcha turini tanlang!',
            'file_1.required' => 'Rasmni kiriting!',
        ];
    }
}
