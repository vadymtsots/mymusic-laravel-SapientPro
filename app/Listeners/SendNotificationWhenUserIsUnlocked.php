<?php

namespace App\Listeners;

use App\Events\UserIsUnblocked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationWhenUserIsUnlocked
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserIsUnblocked $event)
    {
        $user = $event->user;
        \App\Jobs\NotifyUnlockedUser::dispatch($user);
    }
}
