<?php

namespace App\Mail;

use App\Models\ResourceFeaturedSubscription;
use App\Models\ResourceFeaturedSubscriptionInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResourceFeaturedSlotRenewedMail extends Mailable
{
    use Queueable, SerializesModels;

    public ResourceFeaturedSubscription $subscription;
    public ResourceFeaturedSubscriptionInvoice $invoice;
    public bool $isAdmin;

    public function __construct(ResourceFeaturedSubscription $subscription, ResourceFeaturedSubscriptionInvoice $invoice, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
        $this->invoice = $invoice;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $this->subscription->loadMissing(['company', 'resourcePage', 'slot']);

        $companyName = $this->subscription->company->company_name
            ?? $this->subscription->company->name
            ?? 'Company';

        $resourceName = $this->subscription->resourcePage->title ?? 'Resource';

        return $this->subject($this->isAdmin
                ? "Resource Featured Slot Renewed - {$companyName}"
                : "Your Resource Featured Slot Renewed")
            ->view('emails.resource-featured-ads.renewed')
            ->with([
                'subscription' => $this->subscription,
                'invoice' => $this->invoice,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'resourceName' => $resourceName,
            ]);
    }
}
