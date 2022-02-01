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
                'activity_type_id'=> $this->activityType->name,  //not working
                'state_id'=> $this->state->name, //working
                'region_id'=> $this->region->name, //working
                'address_id'=> $this->address->name, //working
                'home_address'=> $this->home_address, 
                'order_reason'=> $this->order_reason, 
                'type_id'=> $this->type->name, //working
            ],
            'contacts' => [
                'client_name' => $this->client_name,
                'client_phone_number' => $this->client_phone_number,
                'client_phone_number_2' => $this->client_phone_number_2,
                'client_born_date' => $this->client_born_date,
                'operator_id' => $this->operator->name,//working
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
