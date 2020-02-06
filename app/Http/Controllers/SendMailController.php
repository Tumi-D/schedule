<?php

namespace App\Http\Controllers;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index()
    {
        // auth()->user()->assignRole('Admin');
        $email = "chrisdebbra@gmail.com";
        $to_name = "Chris Debrah";
        $subject = "A test mail";

        $to_email = "chrisdebbra@gmail.com";
        $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        $pdf = PDF::loadView('schedule');
        $pdf->setEncryption('password');

        // Mail::send('emails.email', $data, function ($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)->subject('Laravel Test Mail');
        //     $message->from('johnwayguesthouse@gmail.com', 'Test Mail');
        // });
        // Mail::send('emails.email', $data, function ($message) use ($email, $subject) {
        //     $message->to($email)->subject($subject)
        //         ->attachData($pdf->output(), "invoice.pdf");;
        // });
        // worked
        Mail::send('schedule', $data, function ($message) use ($data, $pdf, $to_email, $to_name, $subject) {

            $message->to($to_email, $to_name)

                ->subject($subject)

                ->attachData($pdf->output(), "spoof.pdf");
        });
    }
    // public function sendmail(Request $request)
    // {
    //     $data["email"] = $request->get("email");
    //     $data["client_name"] = $request->get("client_name");
    //     $data["subject"] = $request->get("subject");

    //     $pdf = PDF::loadView('mails.mail', $data);

    //     try {
    //         Mail::send('mails.mail', $data, function ($message) use ($data, $pdf) {
    //             $message->to($data["email"], $data["client_name"])
    //                 ->subject($data["subject"])
    //                 ->attachData($pdf->output(), "invoice.pdf");
    //         });
    //     } catch (JWTException $exception) {
    //         $this->serverstatuscode = "0";
    //         $this->serverstatusdes = $exception->getMessage();
    //     }

    //     if (Mail::failures()) {
    //         $this->statusdesc  =   "Error sending mail";
    //         $this->statuscode  =   "0";
    //     } else {

    //         $this->statusdesc  =   "Message sent Succesfully";
    //         $this->statuscode  =   "1";
    //     }
    //     return response()->json(compact('this'));
    // }

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

        // $users = User::all()->take(10);
        // foreach ($users as $key => $user) {
        //     $user->assignRole('Admin');
        // }
    }
}
