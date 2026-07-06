<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GetQuoteEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $get_quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($get_quote)
    {
        $this->get_quote = $get_quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Mail From My Moving Journey')
                    ->view('emails.getQuoteMail');
    }
}
