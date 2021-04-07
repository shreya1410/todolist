<?php

namespace App\Listner;

use App\Events\SentTaskMail;
use App\Mail\SendMarkDown;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SentTaskMailListener implements ShouldQueue
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
     * @param  SentTaskMail  $event
     * @return void
     */
    public function handle(SentTaskMail $event)
    {

        $data = array('title' => $event->todo->title,  'body' => 'Welcome to our website. Hope you will enjoy our articles');

        Mail::send('emails.taskMail', $data, function($message) use ($data) {
            $message->to("test@test.com")
                ->subject('Welcome to our Website');
            $message->from('shreyaraval415@gmail.com');
        });

    //    $data = array('title' => $event->todo->title,  'body' => 'Welcome to todo list. Hope you will do your task');
//        Mail::send('emails.markdown', $data, function($message) use ($data){
//        $message->to("test@test.com")
//                ->subject('Welcome to our Website');
//           $message->from('shreyaraval415@gmail.com');
//    });
    }
}
