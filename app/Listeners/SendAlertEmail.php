<?php

namespace App\Listeners;

use App\Events\ErrorLoged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAlertEmail
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
     * @param  ErrorLoged  $event
     * @return void
     */
    public function handle(ErrorLoged $event)
    {
      $data1 = array(
          'name'      =>  'hassan',
          'message'   =>   'event',
          'email'   =>   'email'
      );
   Mail::to('hassankhosrojerdi@yahoo.com')->send(new SendMail($data1));

    }
}
