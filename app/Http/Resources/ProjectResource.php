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
            'general_info' => $this->general_info,
            'tech_doc' => json_decode($this->tech_doc),
            'file_doc' => json_decode($this->file_doc),
            'status_id' => $this->status_id,
            'developer_id' => $this->developer->id,
            'dev_doc' => json_decode($this->dev_doc),
            'developer_name' => $this->developer->name,
            'client_id' => $this->client->id,
            'client_name' => $this->client->client_name,
            'start_date' => $this->start_date,
            // 'deadline_date' => $this->deadline_date,
            'finish_date' => $this->finish_date,
        ];
    }
}

