<?php

namespace App\Listeners;

use App\Events\NewUser;
use App\Events\UserIsBanned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationWhenUserIsBanned
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
     * @param NewUser $event
     * @return void
     */
    public function handle(UserIsBanned $event)
    {
        $user = $event->user;
        \App\Jobs\SendNotificationJob::dispatch($user);
    }
}
