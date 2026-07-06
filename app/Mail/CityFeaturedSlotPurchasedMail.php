<?php

namespace App\Mail;

use App\Models\CityFeaturedSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CityFeaturedSlotPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public CityFeaturedSubscription $subscription;
    public bool $isAdmin;

    public function __construct(CityFeaturedSubscription $subscription, bool $isAdmin = false)
    {
        $this->subscription = $subscription;
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
                ? "City Featured Slot Purchased - {$companyName}"
                : "Your City Featured Slot is Active")
            ->view('emails.city-featured-ads.purchased')
            ->with([
                'subscription' => $this->subscription,
                'isAdmin' => $this->isAdmin,
                'companyName' => $companyName,
                'cityName' => $cityName,
            ]);
    }
}
