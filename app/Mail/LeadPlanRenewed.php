<?php

namespace App\Mail;

use App\Models\CompanyLeadPlanSubscription;
use App\Models\LeadBillingHistory;
use App\Models\LeadSubscriptionPlan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadPlanRenewed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public object $company,
        public LeadSubscriptionPlan $plan,
        public CompanyLeadPlanSubscription $subscription,
        public LeadBillingHistory $billingHistory,
        public bool $adminCopy = false
    ) {}

    public function build(): self
    {
        $subjectPrefix = $this->adminCopy ? 'Admin Copy: ' : '';

        return $this->subject($subjectPrefix . 'Lead Plan Renewed - ' . $this->plan->name)
            ->view('emails.lead-subscriptions.renewed')
            ->with([
                'company' => $this->company,
                'plan' => $this->plan,
                'subscription' => $this->subscription,
                'billingHistory' => $this->billingHistory,
                'adminCopy' => $this->adminCopy,
            ]);
    }
}

