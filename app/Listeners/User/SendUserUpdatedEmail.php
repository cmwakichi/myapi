<?php

namespace App\Listeners;

use App\Mail\UserUpdatedMail;
use Illuminate\Support\Facades\Mail;
use App\Events\Models\User\UserUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserUpdatedEmail
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
     * @param  UserUpdated $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new UserUpdatedMail($user));
    }
}
