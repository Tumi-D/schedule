<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Location;
use App\LocationUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RunScheduleController extends Controller
{
    public function index()
    {
        // Update all Previous schedules
        $previousSchedule = LocationUsers::where('selected', 'session')->get();

        foreach ($previousSchedule as $key => $previous) {
            $oldSchedule = LocationUsers::find($previous->id);
            $oldSchedule->selected = 'done';
            $oldSchedule->save();
        }

        //Get the next friday
        $date = date('Y-m-d', strtotime('next friday'));
        //Get All Users
        $users = User::all();

        //Then Shuffle erm
        $users = $users->shuffle();

        //Pluck the first one out make him admin
        $admin = $users->first();
        $users = $users->diff([$admin]);

        $users->count();
        //Get the number of the rest of users we have to schedule
        $numberofusers = $users->count();

        //Save Admin Schedule
        $newLocation = new LocationUsers();
        $newLocation->location_id = 0;
        $newLocation->user_id = $admin->id;
        $newLocation->role = "isAdmin";
        $newLocation->meeting = $date;
        $newLocation->save();
        $locations = Location::all();
        $numberlocations = $locations->count();

        //Get Excess
        $excess = $numberofusers % $numberlocations;

        //Get Maximized locations fill
        $placement = $numberofusers - $excess;

        //Get Minimum number of people for every location
        $placementperlocation = (float) $numberofusers / $numberlocations;
        $placementperlocation =  sprintf('%.1f', $placementperlocation);
        list($minimum, $normal) = sscanf($placementperlocation, '%d.%d');


        // $other = \collect([]);
        ///Make Sure all location have a minimum number of people
        foreach ($locations as $key => $location) {
            for ($i = 1; $i <= $minimum; $i++) {
                $user = $users->pop();
                $schedule = new LocationUsers();
                $schedule->location_id = $location->id;
                $schedule->user_id = $user->id;
                $schedule->role = "Normal";
                $schedule->meeting = $date;
                $schedule->save();
            }
        }

        if ($excess > 0) {
            $HigherPriorityLocations = Location::where('priority', '=', 'High')->get();
            $schedule = new LocationUsers();
            foreach ($HigherPriorityLocations as $key => $location) {
                if ($users->count()) {
                    $user = $users->pop();
                    $schedule = new LocationUsers();
                    $schedule->location_id = $location->id;
                    $schedule->user_id = $user->id;
                    $schedule->role = "Normal";
                    $schedule->meeting = $date;
                    $schedule->save();
                }
            }
        }
    }

    public function recentSchedule()
    {
        $locations = Location::all();
        return ScheduleResource::collection($locations);
    }
}
