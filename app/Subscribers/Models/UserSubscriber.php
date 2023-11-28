<?php

namespace App\Subscribers\Models;

use App\Models\User;
use Illuminate\Events\Dispatcher;
use App\Events\Models\User\UserCreated;
use App\Events\Models\User\UserDeleted;
use App\Events\Models\User\UserUpdated;
use App\Listeners\User\SendUserDeletedEmail;
use App\Listeners\User\SendWelcomeEmail;
use App\Listeners\User\SendUserUpdatedEmail;

class UserSubscriber{

    public function subscribe(Dispatcher $events){

        $events->listen(UserCreated::class, SendWelcomeEmail::class);
        $events->listen(UserUpdated::class, SendUserUpdatedEmail::class);
        $events->listen(UserDeleted::class, SendUserDeletedEmail::class);
    }
}
