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
            'project_name' => $this->project_name,
            'general_info' => $this->general_info,
            'general_file' => $this->general_file,
            'status_id' => $this->status_id,
            'developer_id' => $this->developer->name,
            'developer_info' => $this->developer_info,
            'start_date' => $this->start_date,
            'dedline_date' => $this->deadline_date,
            'finish_date' => $this->finish_date,
            'about_file' => $this->about_file,
            'project_file' => $this->project_file,
            'client_id' => $this->client->client_name,
        ];
    }
}
