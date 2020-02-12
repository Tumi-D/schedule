<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleCollection;
use App\Location;


class RunScheduleController extends Controller
{

    public function recentSchedule()
    {
        $locations = Location::all();
        return new ScheduleCollection($locations);
    }
}
