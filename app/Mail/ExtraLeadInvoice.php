<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExtraLeadInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $lead;
    public $amount;

    public function __construct($company, $lead, $amount)
    {
        $this->company = $company;
        $this->lead = $lead;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Invoice: Lead Unlock #' . (20000 + $this->lead->id))
            ->view('emails.lead-subscriptions.company-extra-lead-invoice');
    }
}
