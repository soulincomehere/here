<?php

namespace App\Listeners;

use App\Events\LoginSendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSendEventListener
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
     * @param  LoginSendEvent  $event
     * @return void
     */
    public function handle(LoginSendEvent $event)
    {
        //
    }
}
