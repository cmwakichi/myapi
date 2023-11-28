<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\Models\User\UserCreated;
use App\Listeners\User\SendWelcomeEmail;
use App\Subscribers\Models\PostSubscriber;
use App\Subscribers\Models\UserSubscriber;
use App\Subscribers\Models\CommentSubscriber;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //UserCreated::class=>[
            //SendWelcomeEmail::class,
        //],
    ];

    protected $subscribe = [
       UserSubscriber::class,
       CommentSubscriber::class,
       PostSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
