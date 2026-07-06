<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminLeadNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The objects containing transaction details.
     */
    public $company;
    public $lead;
    public $amount;

    /**
     * Create a new message instance.
     *
     * @param $company
     * @param $lead
     * @param int $amount (Amount in cents)
     * @return void
     */
    public function __construct($company, $lead, $amount)
    {
        $this->company = $company;
        $this->lead = $lead;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->company->company_name . ' Buy and Unlocked Extra Lead ')
            ->view('emails.lead-subscriptions.admin-lead-notification')
            ->with([
                'displayAmount' => number_format($this->amount / 100, 2),
                'leadId' => 20000 + $this->lead->id,
            ]);
    }
}
