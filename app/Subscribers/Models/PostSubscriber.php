<?php

namespace App\Subscribers\Models;

use Illuminate\Events\Dispatcher;
use App\Events\Models\Post\PostCreated;
use App\Listeners\Post\SendPostCreatedEmail;

class PostSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(PostCreated::class, SendPostCreatedEmail::class);
        //$events->listen(Post::class, SendPostUpdatedEmail::class);
        //$events->listen(Post::class, SendPostDeletedEmail::class);
    }
}
