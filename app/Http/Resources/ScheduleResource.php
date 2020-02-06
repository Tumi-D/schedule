<?php

namespace App\Http\Resources;

use App\Location;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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

        // parent::toArray($request)
        return [


            "location" => $this->name,
            "users" =>  $location->users()->pluck('name'),
            "numbers" =>  $location->users()->count(),
            'date' => $location->users()->pluck('meeting')
            // "placements" => [
            //     "location" => $this->name,
            //     "users" =>  $location->users()->pluck('name'),
            //     "numbers" =>  $location->users()->count(),
            // ],
            // "date" => $location->users()->pluck('meeting')

        ];
    }
    public function with($request)
    {
        $location = Location::find(1);
        return [
            'date' => $location->users()->pluck('meeting'),
            'author' => 'Chris Debrah'
        ];
    }
}
