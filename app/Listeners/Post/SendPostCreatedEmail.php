<?php

namespace App\Listeners\Post;

use App\Mail\PostCreatedMail;
use App\Events\Models\Post\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostCreatedEmail
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
     * @param  PostCreated $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new PostCreatedMail($user));
    }
}
