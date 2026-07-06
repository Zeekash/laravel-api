<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StateFeaturedSlot extends Model
{
    protected $fillable = [
        'state_id',
        'slot_number',
        'label',
        'monthly_price_cents',
        'yearly_price_cents',
        'yearly_discount_percent',
        'lead_addon_enabled',
        'lead_addon_leads_count',
        'lead_addon_price_cents',
        'lead_addon_note',
        'perks',
        'is_active',
    ];

    protected $casts = [
        'perks' => 'array',
        'is_active' => 'boolean',
        'monthly_price_cents' => 'integer',
        'yearly_price_cents' => 'integer',
        'yearly_discount_percent' => 'integer',
        'lead_addon_enabled' => 'boolean',
        'lead_addon_leads_count' => 'integer',
        'lead_addon_price_cents' => 'integer',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(StateFeaturedSubscription::class, 'state_featured_slot_id');
    }

    public function activeSubscription(): HasOne
    {
        return $this->hasOne(StateFeaturedSubscription::class, 'state_featured_slot_id')
            ->whereIn('status', ['active', 'past_due'])
            ->where(function (Builder $query) {
                $query->whereNull('ends_at')->orWhere('ends_at', '>', now());
            })
            ->latestOfMany();
    }

    public function pendingReservation(): HasOne
    {
        return $this->hasOne(StateFeaturedSubscription::class, 'state_featured_slot_id')
            ->where('status', 'pending')
            ->where('reserved_until', '>', now())
            ->latestOfMany();
    }

    public function getMonthlyPriceAttribute(): float
    {
        return round($this->monthly_price_cents / 100, 2);
    }

    public function getYearlyPriceAttribute(): float
    {
        return round($this->yearly_price_cents / 100, 2);
    }

    public function priceCentsFor(string $billingCycle): int
    {
        return $billingCycle === 'yearly' ? $this->yearly_price_cents : $this->monthly_price_cents;
    }

    public function leadAddonPriceCentsFor(string $billingCycle): int
    {
        if (! $this->lead_addon_enabled) {
            return 0;
        }

        $monthlyPrice = (int) ($this->lead_addon_price_cents ?? 0);

        return $billingCycle === 'yearly' ? $monthlyPrice * 12 : $monthlyPrice;
    }

    public function isAvailable(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        return ! $this->activeSubscription()->exists() && ! $this->pendingReservation()->exists();
    }
}
