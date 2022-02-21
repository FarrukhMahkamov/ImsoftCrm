<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'city' => $this->city ? $this->city->name : '',
            'city_id' => $this->city ? $this->city->id : '',
            'state_name' => $this->state ? $this->state->name : '',
            'state_id' => $this->state ? $this->state->id : '',
        ];
    }
}
