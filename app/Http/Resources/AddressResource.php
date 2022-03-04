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
            'region_name' => $this->region ? $this->region->name : 'O\'chirilgan',
            'region_id' => $this->region ? $this->region->id : '',
            'state_name' => $this->state ? $this->region->state->name : 'O\'chirilgan',
            'state_id' => $this->state ? $this->region->state->id : '',
        ];
    }
}
