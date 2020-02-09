<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      if(isset($data)){
        $this->data = $data;
      }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      if(!isset($data)){
        return $this->from('oomidshop@gmail.com')->subject('یک خطای جدید گزارش شد')->view('emails.error-email');
      }
      else{
        return $this->from('oomidshop@gmail.com')->subject('پیام جدید از تماس با ما وبسایت')->view('emails.dynamic_email_template')->with('data', $this->data);
      }
    }
}

?>
