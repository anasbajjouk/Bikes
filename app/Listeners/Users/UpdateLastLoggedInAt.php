<?php

namespace App\Listeners\Users;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;


class UpdateLastLoggedInAt
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        
        $user = Auth::user();
        $event->user->last_login_at = Carbon::now();
        //$event->user->last_login_ip =  \Request::ip();
        $event->user->save();
    }
}
