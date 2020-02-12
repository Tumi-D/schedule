<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleCollection;
use App\Location;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
// use PDF;

class SendMailController extends Controller
{
    public function index()
    {
        // auth()->user()->assignRole('Admin');
        // $email = "chrisdebbra@gmail.com";
        // $to_name = "Chris Debrah";
        // $subject = "A test mail";

        // $to_email = "chrisdebbra@gmail.com";
        // $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        // $pdf = PDF::loadView('emails.email', $data);
        // $pdf->setEncryption('password');

        // Mail::send('emails.email', $data, function ($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)->subject('Laravel Test Mail');
        //     $message->from('johnwayguesthouse@gmail.com', 'Test Mail');
        // });
        // Mail::send('emails.email', $data, function ($message) use ($email, $subject) {
        //     $message->to($email)->subject($subject)
        //         ->attachData($pdf->output(), "invoice.pdf");;
        // });
        // worked
        // Mail::send('emails.email', $data, function ($message) use ($data, $pdf, $to_email, $to_name, $subject) {

        //     $message->to($to_email, $to_name)

        //         ->subject($subject)

        //         ->attachData($pdf->output(), "spoof.pdf");
        // });
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
        $data['user'] = auth()->user();
        $data = array('meeting' => $data['meeting'], "admin" => $data['admin'], "user" => auth()->user(), "locations" => $locations);
        $pdf = PDF::loadView('emails.porsche', $data);
        // $pdf->setEncryption('password');

        Mail::send('emails.porsche', $data, function ($message) use ($data, $pdf, $to_email, $to_name, $subject) {
            $message->to($to_email, $to_name)
                ->subject($subject)
                ->attachData($pdf->output(), "shedule.pdf");
        });
    }


    public function schedule()
    {
        return view('schedule');
    }
    public function assign()
    {
        ///Make EveryOne An Admin
        // $users = User::all();
        // foreach ($users as $key => $user) {
        //     $user->assignRole('Admin');
        // }
        // echo "done";

        $users = User::all()->take(10);
        foreach ($users as $key => $user) {
            $user->assignRole('Admin');
        }
    }

    public function loadschedule()
    {
        $data['locations'] = Location::all();
        // $user_id = DB::select('select  DISTINCT user_id from location_user where selected = "session" AND  role ="IsAdmin"');
        $user = DB::table('location_user')->where('selected', 'session')->where('role', 'IsAdmin')->first();
        $user_id = $user->user_id;
        $data['meeting'] = $user->meeting;
        $data['meeting'] = Carbon::parse($data['meeting']);
        $data['meeting'] =  $data['meeting']->isoFormat('MMMM Do YYYY');
        $data['admin'] = User::find($user_id)->name;
        $data['user'] = auth()->user();
        return view('schedule')->with("locations", $data);
    }
}
