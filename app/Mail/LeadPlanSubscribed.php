<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadPlanSubscribed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $company,
        public $plan,
        public $isAdmin = false,
        public $subscription = null
    ) {}

    public function build()
    {
        $subject = $this->isAdmin
            ? "New Subscription: {$this->company->company_name}"
            : "Welcome to the {$this->plan->name} Plan!";

        return $this->subject($subject)
            ->view('emails.lead-subscriptions.subscribed-mail');
    }
}
