<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\SheduleCreatedEvent;
use App\Listeners\SendUsersEmailOfTeamMates;
use App\Listeners\GeneratePdfOfShchedule;
use App\Listeners\SendUsersWhatsAppDocument;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SheduleCreatedEvent::class => [
            GeneratePdfOfShchedule::class,
            SendUsersEmailOfTeamMates::class,
            SendUsersWhatsAppDocument::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
