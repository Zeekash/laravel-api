<?php

namespace App\Mail;

use App\Models\StateFeaturedSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StateFeaturedSlotCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public StateFeaturedSubscription $subscription;
    public bool $isAdmin;

    public function __construct(StateFeaturedSubscription $subscription, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $this->subscription->loadMissing(['company', 'state', 'slot']);

        $companyName = $this->subscription->company->company_name
            ?? $this->subscription->company->name
            ?? 'Company';

        $stateName = $this->subscription->state->name ?? 'State';

        $subject = $this->isAdmin
            ? "State Featured Slot Cancelled - {$companyName}"
            : "Your State Featured Slot Cancellation";

        return $this->subject($subject)
            ->view('emails.state-featured-ads.cancelled')
            ->with([
                'subscription' => $this->subscription,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'stateName' => $stateName,
            ]);
    }
}