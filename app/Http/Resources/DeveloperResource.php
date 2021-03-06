<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
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
            'name' => $this->name,
            'born_date' => $this->born_date,
            'phone_number' => $this->phone_number,
            'type_id' => $this->type ? $this->type->id : 'null',
            'type_name' => $this->type ? $this->type->name : 'null',
            'about' => $this->about,
            'passport' => $this->passport,
            'family' => $this->family,
            'developer_photo' => $this->developer_photo,
            'state_id' => $this->state ? $this->state->id : 'null',
            'state_name' => $this->state ? $this->state->name : 'null',
            'region_id' => $this->region ? $this->region->id : 'null',
            'region_name' => $this->region ? $this->region->name : 'null',
            'address' => $this->address,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
    }
}
