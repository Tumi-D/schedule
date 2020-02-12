<?php

namespace App\Listeners;

use App\Events\SheduleCreatedEvent;
use App\Location;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;


class SendUsersEmailOfTeamMates
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
        $to_name = "Chris Debrah";
        $subject = "A test mail";

        $to_email = "chrisdebbra@gmail.com";
        $locations = Location::all();
        $user = DB::table('location_user')->where('selected', 'session')->where('role', 'IsAdmin')->first();
        $user_id = $user->user_id;

        $data['meeting'] = $user->meeting;
        $data['meeting'] = Carbon::parse($data['meeting']);
        $data['meeting'] =  $data['meeting']->isoFormat('MMMM Do YYYY');
        $data['admin'] = User::find($user_id)->name;
        $data['user'] = User::find(5);
        $data = array('meeting' => $data['meeting'], "admin" =>  User::find($user_id)->name, "user" => $data['user'], "locations" => $locations);

        // $locations = $data;
        $pdf = PDF::loadView('emails.mailschedule', $data);

        // $pdf->setEncryption('password');

        Mail::send('emails.mailschedule', $data, function ($message) use ($data, $pdf, $to_email, $to_name, $subject) {
            $message->to($to_email, $to_name)
                ->subject($subject)
                ->attachData($pdf->output(), "shedule.pdf");
        });
    }
}
