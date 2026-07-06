<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StateFeaturedSubscriptionInvoice extends Model
{
    protected $fillable = [
        'state_featured_subscription_id',
        'company_id',
        'stripe_invoice_id',
        'amount_paid_cents',
        'slot_price_cents',
        'lead_addon_price_cents',
        'lead_addon_leads_count',
        'currency',
        'status',
        'period_start',
        'period_end',
        'paid_at',
        'hosted_invoice_url',
        'invoice_pdf',
    ];

    protected $casts = [
        'amount_paid_cents' => 'integer',
        'slot_price_cents' => 'integer',
        'lead_addon_price_cents' => 'integer',
        'lead_addon_leads_count' => 'integer',
        'period_start' => 'datetime',
        'period_end' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(StateFeaturedSubscription::class, 'state_featured_subscription_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getAmountPaidAttribute(): float
    {
        return round(($this->amount_paid_cents ?? 0) / 100, 2);
    }

    public function getAmountFormattedAttribute(): string
    {
        return strtoupper($this->currency ?? 'USD') . ' ' . number_format(($this->amount_paid_cents ?? 0) / 100, 2);
    }

    public function getSlotAmountFormattedAttribute(): string
    {
        return strtoupper($this->currency ?? 'USD') . ' ' . number_format(($this->slot_price_cents ?? 0) / 100, 2);
    }

    public function getLeadAddonAmountFormattedAttribute(): string
    {
        return strtoupper($this->currency ?? 'USD') . ' ' . number_format(($this->lead_addon_price_cents ?? 0) / 100, 2);
    }
}
