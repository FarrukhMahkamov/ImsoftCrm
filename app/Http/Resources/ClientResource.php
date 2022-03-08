<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'general_info' => $this->general_info, // null
                'general_document' => json_decode($this->general_document), // required
                'enterprise_name'=> $this->enterprise_name, // required 
                'category_id'=> $this->category ? $this->category->id : 'O\'chirilgan', //working //required
                'category_name'=> $this->category ? $this->category->name : 'O\'chirilgan', //working //required
                'activity_type_id'=> $this->activityType ? $this->activityType->id : 'O\'chirilgan',  //working
                'activity_type_name'=> $this->activityType ? $this->activityType->name : 'O\'chirilgan',  //working
                'state_id'=> $this->state ? $this->state->id : 'O\'chirilgan', //working //required
                'state_name'=> $this->state ? $this->state->name : 'O\'chirilgan', //working //required
                'region_id'=> $this->region ? $this->region->id : 'O\'chirilgan', //working
                'region_name'=> $this->region ? $this->region->name : 'O\'chirilgan', //working
                'address_id'=> $this->address ? $this->address->id : 'O\'chirilgan', //working
                'address_name'=> $this->address ? $this->address->name : 'O\'chirilgan', //working
                'home_address'=> $this->home_address, 
                'order_reason'=> $this->order_reason, //null
                'client_name' => $this->client_name, //req
                'client_phone_number' => $this->client_phone_number,//req
                'client_phone_number_2' => $this->client_phone_number_2,
                'client_born_date' => $this->client_born_date,//null
                'operator_name' => $this->operator_name,//working
                'operator_phone_number' => $this->operator_phone_number,//null
                'operator_phone_number_2' => $this->operator_phone_number_2,//null
                'operator_born_date' => $this->operator_born_date,//null
                'latitude' => $this->latitude,//req
                'longitude' => $this->longitude,//req
                'file_1' => $this->file_1,//null
                'file_2' => $this->file_2,//null
                'file_3' => $this->file_3,//null
                'client_status' => $this->client_status,//req
                'created_at' => $this->created_at
        ];
    }
}
