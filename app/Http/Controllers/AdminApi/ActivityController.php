<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Twilio\Rest\Taskrouter\V1\Workspace\ActivityList;

class ActivityController extends Controller
{


    public function index()
    {
        $activity = User::find(2)->actions;

        // $activity = auth()->user()->actions->load('causer');
        return  $activity;
    }
}
