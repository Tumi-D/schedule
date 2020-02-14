<?php

namespace App\Listeners;

use App\Events\SheduleCreatedEvent;
use App\Location;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class GeneratePdfOfShchedule
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SheduleCreatedEvent  $event
     * @return void
     */
    public function handle(SheduleCreatedEvent $event)
    {
        $data['locations'] = Location::all();
        // $user_id = DB::select('select  DISTINCT user_id from location_user where selected = "session" AND  role ="IsAdmin"');
        $user = DB::table('location_user')->where('selected', 'session')->where('role', 'IsAdmin')->first();
        $user_id = $user->user_id;
        $data['meeting'] = $user->meeting;
        $data['meeting'] = Carbon::parse($data['meeting']);
        $data['meeting'] =  $data['meeting']->isoFormat('MMMM Do YYYY');
        $data['admin'] = User::find($user_id)->name;
        $data['user'] = User::find($user_id);
        $data = array('meeting' => $data['meeting'], "admin" => $data['admin'], "user" =>  $data['user'], "locations" =>  $data['locations']);
        $pdf = PDF::loadView('schedule', $data);
        $pdf->setPaper('A4', 'landscape');
        $path = public_path('pdf/');
        $fileName =  "EWC_Protocol_Friday_Schedule.pdf";
        $pdf->save($path . '/' . $fileName);
        return $pdf->download($fileName);
        // $content = $pdf->download()->getOriginalContent();
        // Storage::put('public/pdf/Schedule.pdf', $content);
    }
}
