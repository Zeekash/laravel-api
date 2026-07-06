<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StateFeaturedSubscription extends Model
{
    protected $fillable = [
        'state_featured_slot_id',
        'state_id',
        'company_id',
        'user_id',
        'billing_cycle',
        'price_cents',
        'lead_addon_selected',
        'lead_addon_leads_count',
        'lead_addon_price_cents',
        'total_price_cents',
        'discount_percent',
        'status',
        'reserved_until',
        'starts_at',
        'ends_at',
        'canceled_at',
        'cancel_at_period_end',
        'stripe_customer_id',
        'stripe_subscription_id',
        'stripe_checkout_session_id',
        'stripe_product_id',
        'stripe_price_id',
        'stripe_lead_addon_product_id',
        'stripe_lead_addon_price_id',
    ];

    protected $casts = [
        'price_cents' => 'integer',
        'lead_addon_selected' => 'boolean',
        'lead_addon_leads_count' => 'integer',
        'lead_addon_price_cents' => 'integer',
        'total_price_cents' => 'integer',
        'discount_percent' => 'integer',
        'reserved_until' => 'datetime',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'canceled_at' => 'datetime',
        'cancel_at_period_end' => 'boolean',
    ];

    public function slot(): BelongsTo
    {
        return $this->belongsTo(StateFeaturedSlot::class, 'state_featured_slot_id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(StateFeaturedSubscriptionInvoice::class, 'state_featured_subscription_id');
    }

    public function getPriceAttribute(): float
    {
        return round($this->price_cents / 100, 2);
    }

    public function getTotalPriceCentsValueAttribute(): int
    {
        return (int) ($this->total_price_cents ?: (($this->price_cents ?? 0) + ($this->lead_addon_price_cents ?? 0)));
    }

    public function getTotalPriceAttribute(): float
    {
        return round($this->total_price_cents_value / 100, 2);
    }
}
