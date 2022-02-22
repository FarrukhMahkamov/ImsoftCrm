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
                'general_doc' => $this->general_document, // required
                'enterprise_name'=> $this->enterprise_name, // required 
                'category_id'=> $this->category->name, //working //required
                'activity_type_id'=> $this->activityType->id,  //working
                'state_id'=> $this->state->id, //working //required
                'region_id'=> $this->region->id, //working
                'address_id'=> $this->address->id, //working
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
                'longtitude' => $this->longtitude,//req
                'file_1' => $this->file_1,//null
                'file_2' => $this->file_2,//null
                'file_3' => $this->file_3,//null
                'client_status' => $this->client_status,//req
                'created_at' => date_format($this->created_at, 'Y-m-d H:i:s')
        ];
    }
}
