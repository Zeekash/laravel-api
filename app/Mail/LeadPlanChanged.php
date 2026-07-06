<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadPlanChanged extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $company,
        public $oldPlan,
        public $newPlan,
        public $isAdmin = false
    ) {}

    public function build()
    {
        $type = $this->newPlan->leads_per_month > $this->oldPlan->leads_per_month ? 'Upgrade' : 'Downgrade';
        $subject = $this->isAdmin 
            ? "Plan Change: {$this->company->name} ({$type})" 
            : "Your plan has been updated to {$this->newPlan->name}";

        return $this->subject($subject)
                    ->view('emails.lead-subscriptions.changed-plan-mail');
    }
}
