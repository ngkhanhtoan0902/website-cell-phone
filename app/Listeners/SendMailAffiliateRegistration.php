<?php

namespace App\Listeners;

use App\Events\AffiliateRegistrationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use RSolution\RCms\Mail\UserWelcome;

class SendMailAffiliateRegistration
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
     * @param  AffiliateRegistrationEvent  $event
     * @return void
     */
    public function handle(AffiliateRegistrationEvent $event)
    {
        $mail = (new UserWelcome($event->user))->onQueue('medium');
        Mail::to($event->user)->queue($mail);
    }
}
