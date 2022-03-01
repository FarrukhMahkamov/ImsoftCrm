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
}
