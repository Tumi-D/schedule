<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'created_at' => $this->created_at->diffForHumans(),
            'description' => $this->description,
            'subject' => $this->subject_type

            // 'name' => $this->causer->name

        ];
    }
}
