<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityCollection;
use App\Http\Resources\ActivityResource;
use App\User;
use Illuminate\Http\Request;
use Twilio\Rest\Taskrouter\V1\Workspace\ActivityList;

class ActivityController extends Controller
{


    public function index()
    {
        // $activity = User::find(2)->actions;
        // $activity = auth()->user()->actions->load('causer')->latest()->get();

        $activity = auth()->user()->actions;
        return ActivityResource::collection($activity);
    }
    public function mark($id)
    {
        $user = User::find($id);
        $user->unreadNotifications->markAsRead();
        return response()->json(['status' => 201, 'message' => "done", 'user' => $user]);
    }
}
