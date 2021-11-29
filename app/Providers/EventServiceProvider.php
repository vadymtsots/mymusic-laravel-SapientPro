<?php

namespace App\Providers;

use App\Events\NewUser;
use App\Events\UserIsBanned;
use App\Events\UserIsUnblocked;
use App\Listeners\SendEmail;
use App\Listeners\SendNotificationWhenNewUserRegistered;
use App\Listeners\SendNotificationWhenUserIsBanned;
use App\Listeners\SendNotificationWhenUserIsUnlocked;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewUser::class => [
            SendEmail::class,
            SendNotificationWhenNewUserRegistered::class
        ],

        UserIsBanned::class => [
            SendNotificationWhenUserIsBanned::class
        ],

        UserIsUnblocked::class => [
            SendNotificationWhenUserIsUnlocked::class
        ],
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
