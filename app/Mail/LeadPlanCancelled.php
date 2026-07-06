<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\CompanyLeadPlanSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadPlanCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Company $company,
        public CompanyLeadPlanSubscription $subscription,
        public bool $isAdmin = false
    ) {}

    public function build()
    {
        $subject = $this->isAdmin 
            ? "Notice: Subscription Cancelled by {$this->company->name}" 
            : "Confirmation: Your Lead Plan subscription has been cancelled";

        return $this->subject($subject)
                    ->view('emails.lead-subscriptions.cancelled-mail');
    }
}
