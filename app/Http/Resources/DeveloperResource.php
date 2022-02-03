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
            'start_work' => $this->start_work,
            'surname' => $this->surname,
            'phone_number' => $this->phone_number,
            'work_type' => $this->work_type,
            'about' => $this->about,
            'file' => $this->file,
            'work_status' => $this->workstatus,
        ];
    }
}
