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
            'name' => 'required|min:3|max:200|unique:developers',
            'passport' => 'required',
            'family' => 'required',
            'developer_photo' => 'required',
            'born_date' => 'required',
            'phone_number' => 'required',
            'work_type_id' => 'required',
            'about' => 'required',
        ];
    }
}
