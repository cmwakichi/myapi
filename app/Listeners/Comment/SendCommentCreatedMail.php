<?php

namespace App\Listeners\Comment;

use App\Events\Models\Comment\CommentCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comment\CommentCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentCreatedMail
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
     * @param  CommentCreated $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new CommentCreatedMail($user));
    }
}
