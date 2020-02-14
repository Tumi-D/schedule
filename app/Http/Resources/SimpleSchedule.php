<?php

namespace App\Http\Resources;

use App\Location;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleSchedule extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $location = Location::find($this->id);
        return [
            $this->name => [
                "users" =>  $location->users()->pluck('name'),
                "numbers" =>  $location->users()->count(),
            ]
        ];
    }
}
