<?php

namespace App\Subscribers\Models;

use App\Models\User;

class UserSubscriber{

    public function subscribe(Dispatcher $events){

        $events->listen(User::class, SendWelcomeEmail::class);
        $events->listen(User::class, SendUserUpdatedEmail::class);
        $events->listen(User::class, SendDeletedEmail::class);
    }
}
