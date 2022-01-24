<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservedSeatMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $college_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$college_name)
    {
        $this->message = $message;
        $this->college_name = $college_name;
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.reservedseat');
    }
}
