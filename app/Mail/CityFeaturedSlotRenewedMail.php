<?php

namespace App\Mail;

use App\Models\CityFeaturedSubscription;
use App\Models\CityFeaturedSubscriptionInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CityFeaturedSlotRenewedMail extends Mailable
{
    use Queueable, SerializesModels;

    public CityFeaturedSubscription $subscription;
    public CityFeaturedSubscriptionInvoice $invoice;
    public bool $isAdmin;

    public function __construct(CityFeaturedSubscription $subscription, CityFeaturedSubscriptionInvoice $invoice, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
        $this->invoice = $invoice;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $this->subscription->loadMissing(['company', 'cityPage.state', 'slot']);

        $companyName = $this->subscription->company->company_name
            ?? $this->subscription->company->name
            ?? 'Company';

        $cityName = $this->subscription->cityPage->name ?? 'City';

        return $this->subject($this->isAdmin
                ? "City Featured Slot Renewed - {$companyName}"
                : "Your City Featured Slot Renewed")
            ->view('emails.city-featured-ads.renewed')
            ->with([
                'subscription' => $this->subscription,
                'invoice' => $this->invoice,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'cityName' => $cityName,
            ]);
    }
}
