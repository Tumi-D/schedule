<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthdayEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users a birthday message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get();
        foreach ($users as $user) {

            // Send the email to user
            Mail::queue('emails.birthday', ['user' => $user], function ($mail) use ($user) {
                $mail->to($user['email'])
                    // ->from('you@company.com', 'Company')
                    ->subject('Happy Birthday!');
            });
        }
        $this->info('Birthday messages sent successfully!');
    }
}
