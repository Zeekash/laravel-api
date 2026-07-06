<?php

namespace App\Mail;

use App\Models\StateRouteFeaturedSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StateRouteFeaturedSlotPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public StateRouteFeaturedSubscription $subscription;
    public bool $isAdmin;

    public function __construct(StateRouteFeaturedSubscription $subscription, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $this->subscription->loadMissing(['company', 'fromState', 'toState', 'slot']);

        $companyName = $this->subscription->company->company_name
            ?? $this->subscription->company->name
            ?? 'Company';

        $routeName = $this->subscription->routeName();

        $subject = $this->isAdmin
            ? 'Route Featured Slot Purchased - '.$companyName
            : 'Your Route Featured Slot Purchase';

        return $this->subject($subject)
            ->view('emails.route-featured-ads.purchased')
            ->with([
                'subscription' => $this->subscription,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'routeName' => $routeName,
            ]);
    }
}
