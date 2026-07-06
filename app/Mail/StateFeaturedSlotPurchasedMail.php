<?php

namespace App\Mail;

use App\Models\StateFeaturedSubscription;
use App\Models\StateFeaturedSubscriptionInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StateFeaturedSlotPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public StateFeaturedSubscription $subscription;
    public ?StateFeaturedSubscriptionInvoice $invoice;
    public bool $admin;

    public function __construct(StateFeaturedSubscription $subscription, ?StateFeaturedSubscriptionInvoice $invoice = null, bool $admin = false)
    {
        $this->subscription = $subscription;
        $this->invoice = $invoice;
        $this->admin = $admin;
    }

    public function build()
    {
        $this->subscription->loadMissing(['company', 'state', 'slot']);

        $stateName = optional($this->subscription->state)->name ?: 'State';
        $slotNumber = optional($this->subscription->slot)->slot_number ?: $this->subscription->state_featured_slot_id;

        $subject = $this->admin
            ? "New sponsored state slot purchased - {$stateName} Slot {$slotNumber}"
            : "Your sponsored state slot is active - {$stateName}";

        return $this->subject($subject)
            ->view('emails.state-featured-ads.purchased')
            ->with([
                'subscription' => $this->subscription,
                'invoice' => $this->invoice,
                'admin' => $this->admin,
            ]);
    }
}
