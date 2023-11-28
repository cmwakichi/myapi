<?php

namespace App\Listeners\Comment;

use Illuminate\Support\Facades\Mail;
use App\Mail\Comment\CommentUpdatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Models\Comment\CommentUpdated;

class SendCommentUpdatedMail
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
     * @param  CommentUpdated $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new CommentUpdatedMail($user));
    }
}
