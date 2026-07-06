<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_contact_us;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_contact_us)
    {
        $this->user_contact_us = $user_contact_us;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Mail From My Moving Journey')
                    ->view('emails.userContactUsMail');
    }
}
