<?php

namespace App\Mail;

use App\Models\StateRouteFeaturedSubscription;
use App\Models\StateRouteFeaturedSubscriptionInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StateRouteFeaturedSlotRenewedMail extends Mailable
{
    use Queueable, SerializesModels;

    public StateRouteFeaturedSubscription $subscription;
    public StateRouteFeaturedSubscriptionInvoice $invoice;
    public bool $isAdmin;

    public function __construct(StateRouteFeaturedSubscription $subscription, StateRouteFeaturedSubscriptionInvoice $invoice, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
        $this->invoice = $invoice;
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
            ? 'Route Featured Slot Renewed - '.$companyName
            : 'Your Route Featured Slot Renewed';

        return $this->subject($subject)
            ->view('emails.route-featured-ads.renewed')
            ->with([
                'subscription' => $this->subscription,
                'invoice' => $this->invoice,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'routeName' => $routeName,
            ]);
    }
}
