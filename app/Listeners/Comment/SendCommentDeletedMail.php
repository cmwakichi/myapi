<?php

namespace App\Listeners\Comment;

use Illuminate\Support\Facades\Mail;
use App\Mail\Comment\CommentDeletedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Models\Comment\CommentDeleted;

class SendCommentDeletedMail
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
     * @param  CommentDeleted $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        Mail::to($user)->send(new CommentDeletedMail($user));
    }
}
