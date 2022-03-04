<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'from_whom' => $this->from_whom,
            'general_info' => $this->general_info,
            'tech_doc' => json_decode($this->tech_doc),
            'file_doc' => json_decode($this->file_doc),
            'status_id' => $this->status_id,
            'developer_id' => $this->developer ? $this->developer->id : '',
            'developer_name' => $this->developer ? $this->developer->name : '',
            'dev_doc' => json_decode($this->dev_doc),
            'developer_name' => $this->developer->name,
            'client_id' => $this->client ? $this->client->id : '',
            'client_name' => $this->client ? $this->client->client_name : '',
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
              // 'deadline_date' => $this->deadline_date,
        ];
    }
}

