<?php

namespace App\Subscribers\Models;

use Illuminate\Events\Dispatcher;
use App\Listeners\Comment\SendCommentDeletedMail;
use App\Events\Models\Comment\CommentCreated;
use App\Events\Models\Comment\CommentDeleted;
use App\Events\Models\Comment\CommentUpdated;
use App\Listeners\Comment\SendCommentCreatedMail;
use App\Listeners\Comment\SendCommentUpdatedMail;

class CommentSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(CommentCreated::class, SendCommentCreatedMail::class);
        $events->listen(CommentUpdated::class, SendCommentUpdatedMail::class);
        $events->listen(CommentDeleted::class, SendCommentDeletedMail::class);
    }
}
