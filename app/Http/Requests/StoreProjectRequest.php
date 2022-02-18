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
            'project_name' => 'required|unique:projects',
            'general_info' => 'required',
            'general_file' => 'required',
            'status_id' => 'required',
            'developer_id' => ['required',  Rule::exists('developers', 'id')],
            'developer_info' => 'required',
            'start_date' => 'required',
            'dedline_date' => 'required',
            'finish_date' => 'finish_date',
            'about_file' => 'required',
            'project_file' => 'required',
            'client_id' => ['required', Rule::exists('clients', 'id')],
        ];
    }
}
