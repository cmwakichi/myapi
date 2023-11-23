<?php

namespace App\Subscribers\Models;

use App\Models\Post;

class PostSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Post::class, SendPostCreatedEmail::class);
        $events->listen(Post::class, SendPostUpdatedEmail::class);
        $events->listen(Post::class, SendPostDeletedEmail::class);
    }
}
