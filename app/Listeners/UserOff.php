<?php

namespace App\Listeners;

use App\Events\UserOffEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserOff
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
     * @param  UserOffEvent  $event
     * @return void
     */
    public function handle(UserOffEvent $event)
    {
        $event->user->on_off = 0;
        $event->user->save();
    }
}
