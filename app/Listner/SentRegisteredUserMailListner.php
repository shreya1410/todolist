<?php

namespace App\Listner;

use App\Events\SentRegisteredUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SentRegisteredUserMailListner
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
     * @param  SentRegisteredUserMail  $event
     * @return void
     */
    public function handle(SentRegisteredUserMail $event)
    {
        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');

        Mail::send('emails.mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                ->subject('Welcome to our Website');
            $message->from('shreyaraval415@gmail.com');
        });
    }
}
