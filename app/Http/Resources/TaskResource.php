<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'project' => $this->project_id,
            'issue_type' => $this->issue_type,
            'summary' => $this->summary,
            'reporter' => $this->reporter,
            'attachment' => $this->attachment,
            'due_date' => $this->due_date,
            'description' => $this->description,
            'assignee' => $this->assignee,
        ];
    }
}
// 'due_date' => date("d-m-Y", strtotime($this->due_date)),
