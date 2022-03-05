<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|min:3|max:200|unique:projects',
            'from_whom' => 'required|min:3|max:200',
            'general_info' => 'required',
            'tech_doc' => 'nullable',
            'dev_doc' => 'nullable',
            'file_doc' => 'nullable',
            'status_id' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'developer_id' => 'required',  Rule::exists('developers', 'id'),
            'client_id' => 'required', Rule::exists('clients', 'id'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Proekt nomini kiriting!',
            'name.min' => 'Proekt nomini 3 ta harfdan ko\'p bo\'lishi shart',
            'name.max' => 'Proekt nomini 200 ta harfdan kam bo\'lishi shart',
            'name.unique' => 'Proekt nomi oldin borilgan',
            'from_whom.required' => 'Kim tomonidan ekanligini kiriting!',
            'from_whom.min' => 'Ism 3 ta harfdan ko\'p bo\'lishi shart',
            'from_whom.max' => 'Ism 200 ta harfdan kam bo\'lishi shart',
            'general_info.required' => 'Umimiy ma\'lumotni kiriting!',
            'status_id.required' => 'Proekt holatini tanlang!',
            'start_date.required' => 'Proektni boshlanish sanasini kiriting!',
            'finish_date.required' => 'Proektni tugatish sanasini kiriting!',
            'developer_id.required' => 'Proektni tugatgan foydalanuvchi tanlang!',
            'client_id.required' => 'Proektni tomonidan ekanligi tanlang!',
        ];
    }

}
