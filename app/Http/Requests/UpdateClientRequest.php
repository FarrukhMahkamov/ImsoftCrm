<?php

namespace App\Http\Requests;

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
           'general_info' => 'required|min:20|max:5000', 
           'enterprise_name' => 'required|min:20|max:200', 
           'category_id' => 'required', Rule::exists('categories', 'id'), 
           'activity_type_id' => 'required', Rule::exists('activity_types', 'id'), 
           'state_id' => 'required', Rule::exists('states', 'id'), 
           'region_id' => 'required', Rule::exists('regions', 'id'),  
           'address_id' => 'required', Rule::exists('addresses', 'id'), 
           'home_address' => 'required|min:3|max:200', 
           'client_name' => 'required|min:3|max:200', 
           'client_phone_number' => 'required|min:7|max:5000', 
           'client_phone_number_2' => 'required|min:7|max:5000', 
           'client_born_date' => 'required|min:3|max:20', 
           'operator_id' => 'required', Rule::exists('addresses', 'id'), 
           'operator_phone_number' => 'required|min:7|max:20', 
           'operator_phone_number_2' => 'required|min:7|max:20', 
           'operator_born_date' => 'required|min:3|max:20', 
           'latitude' => 'required|min:3|max:50', 
           'longtitude' => 'required|min:3|max:50', 
           'file' => 'required', 
           'type_id' => 'required', Rule::exists('types', 'id'), 
           'order_time' => 'required'
        ];
    }
}
