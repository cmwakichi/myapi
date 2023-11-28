<?php

namespace App\Listeners\User;

use App\Mail\UserDeletedMail;
use Illuminate\Support\Facades\Mail;
use App\Events\Models\User\UserDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserDeletedEmail
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
     * @param  UserDeleted  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new UserDeletedMail($user));
    }
}
