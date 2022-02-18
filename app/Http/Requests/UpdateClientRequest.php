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
}
