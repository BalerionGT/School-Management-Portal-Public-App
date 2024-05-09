<?php

namespace App\Listeners;

use App\Events\SeanceAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSeanceAddedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeanceAdded $event): voi
    {
        //
    }
}
