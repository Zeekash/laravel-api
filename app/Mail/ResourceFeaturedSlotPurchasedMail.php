<?php

namespace App\Mail;

use App\Models\ResourceFeaturedSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResourceFeaturedSlotPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public ResourceFeaturedSubscription $subscription;
    public bool $isAdmin;

    public function __construct(ResourceFeaturedSubscription $subscription, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
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
                ? "Resource Featured Slot Purchased - {$companyName}"
                : "Your Resource Featured Slot is Active")
            ->view('emails.resource-featured-ads.purchased')
            ->with([
                'subscription' => $this->subscription,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'resourceName' => $resourceName,
            ]);
    }
}
