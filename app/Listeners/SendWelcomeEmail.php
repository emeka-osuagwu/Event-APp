<?php

namespace App\Listeners;

use Mail;
use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        Mail::send('emekaosuagwu@hotmail.com', $event, function($message) use ($event) {
            $message->to($event['email']);
            $message->subject('Welcome to app');
        });
    }
}
