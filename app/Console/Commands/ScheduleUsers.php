<?php

namespace App\Console\Commands;

use App\Notifications\ScheduleCreated;
use Illuminate\Console\Command;
use App\Packages\Schedule;

class ScheduleUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Users';

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

        Schedule::index();
        // $dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');

        $this->info('Users Scheduled Succesfully');
    }
}
