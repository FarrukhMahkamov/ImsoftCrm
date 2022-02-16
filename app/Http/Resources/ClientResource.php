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
            'general_info' => [
                'enterprise_name'=> $this->enterprise_name, 
                'category_id'=> $this->category->name, //working
                'activity_type_name'=> $this->activityType->name,  //working
                'activity_type_id'=> $this->activityType->id,  //working
                'state_name'=> $this->state->name, //working
                'state_id'=> $this->state->id, //working
                'region_name'=> $this->region->name, //working
                'region_id'=> $this->region->id, //working
                'address_name'=> $this->address->name, //working
                'address_id'=> $this->address->id, //working
                'home_address'=> $this->home_address, 
                'order_reason'=> $this->order_reason, 
                'type_name'=> $this->type->name, //working
                'type_id'=> $this->type->id, //working
            ],
            'contacts' => [
                'client_name' => $this->client_name,
                'client_phone_number' => $this->client_phone_number,
                'client_phone_number_2' => $this->client_phone_number_2,
                'client_born_date' => $this->client_born_date,
                'operator_name' => $this->operator->name,//working
                'operator_id' => $this->operator->id,//working
                'operator_phone_number' => $this->operator_phone_number,
                'operator_phone_number_2' => $this->operator_phone_number_2,
                'operator_born_date' => $this->operator_born_date,
                'latitude' => $this->latitude,
                'longtitude' => $this->longtitude,
                'file' => $this->longtitude,
            ],
        ];
    }
}
