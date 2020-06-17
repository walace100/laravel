<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Mail\NovoAcesso;
use Illuminate\Support\Facades\Mail;

class LoginListener
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
    public function handle($event)
    {
        info("logou!");
        info($event->user->name);
        info($event->user->email);
        $quando = now()->addMinutes(5);
        //user, users[], email
        #Mail::to($event->user)->send(new NovoAcesso($event->user))/* ->later($quando, new NovoAcesso($event->user)) */;
    }
}
