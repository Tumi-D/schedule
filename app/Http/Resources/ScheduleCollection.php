<?php

namespace App\Http\Resources;

use App\Location;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;

class ScheduleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $location = Location::find(2);
        return [
            'data' =>   ScheduleResource::collection($this->collection),
            'date' =>   Carbon::parse($location->users()->pluck('meeting')->first())->isoFormat('MMMM Do YYYY'),
            // "generated" =>  $location->users()->pluck('created_at'),
            "author" => "Chris Debrah"
        ];
    }
}
