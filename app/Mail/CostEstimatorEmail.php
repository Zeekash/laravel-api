<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CostEstimatorEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $cost_estimator;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cost_estimator)
    {
        $this->cost_estimator = $cost_estimator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Mail From My Moving Journey')
                    ->view('emails.costEstimatorMail');
    }
}
