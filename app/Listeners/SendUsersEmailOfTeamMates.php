<?php

namespace App\Listeners;

use App\Events\SheduleCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
