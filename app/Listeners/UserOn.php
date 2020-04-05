<?php

namespace App\Listeners;

use App\Events\UserOnEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserOn
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
     * @param  UserOnEvent  $event
     * @return void
     */
    public function handle(UserOnEvent $event)
    {
        $event->user->on_off = 1;
        $event->user->save();
    }
}
