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
            'start_work' => 'required|min:3|max:200',
            'surname' => 'required|min:3|max:200',
            'phone_number' => 'required|min:3|max:20',
            'work_type' => 'required|min:3|max:200',
            'about' => 'required|min:50',
            'file' => 'required|min:5|max:200',
            'workstatus' => 'required|min:5|max:200',
        ];
    }
}
