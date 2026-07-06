<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceFeaturedSlot extends Model
{
    protected $fillable = [
        'resource_page_id',
        'slot_number',
        'label',
        'monthly_price_cents',
        'yearly_price_cents',
        'yearly_discount_percent',
        'perks',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'perks' => 'array',
        'is_active' => 'boolean',
        'monthly_price_cents' => 'integer',
        'yearly_price_cents' => 'integer',
        'yearly_discount_percent' => 'integer',
    ];

    public function resourcePage()
    {
        return $this->belongsTo(ResourcePage::class, 'resource_page_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(ResourceFeaturedSubscription::class, 'resource_featured_slot_id');
    }

    public function activeSubscription()
    {
        return $this->hasOne(ResourceFeaturedSubscription::class, 'resource_featured_slot_id')
            ->whereIn('status', ['active', 'past_due'])
            ->where(function ($q) {
                $q->whereNull('ends_at')
                    ->orWhere('ends_at', '>', now());
            })
            ->latestOfMany();
    }

    public function pendingReservation()
    {
        return $this->hasOne(ResourceFeaturedSubscription::class, 'resource_featured_slot_id')
            ->where('status', 'pending')
            ->where('reserved_until', '>', now())
            ->latestOfMany();
    }

    public function isAvailable(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->relationLoaded('activeSubscription') ? $this->activeSubscription : $this->activeSubscription()->exists()) {
            return false;
        }

        if ($this->relationLoaded('pendingReservation') ? $this->pendingReservation : $this->pendingReservation()->exists()) {
            return false;
        }

        return true;
    }

    public function priceForCycle(string $cycle): int
    {
        return $cycle === 'yearly'
            ? (int) $this->yearly_price_cents
            : (int) $this->monthly_price_cents;
    }
}
