<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateRouteFeaturedSlot extends Model
{
    protected $fillable = [
        'from_state_id',
        'to_state_id',
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

    public function fromState()
    {
        return $this->belongsTo(State::class, 'from_state_id');
    }

    public function toState()
    {
        return $this->belongsTo(State::class, 'to_state_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(StateRouteFeaturedSubscription::class, 'state_route_featured_slot_id');
    }

    public function activeSubscription()
    {
        return $this->hasOne(StateRouteFeaturedSubscription::class, 'state_route_featured_slot_id')
            ->whereIn('status', ['active', 'past_due'])
            ->where(function ($q) {
                $q->whereNull('ends_at')
                    ->orWhere('ends_at', '>', now());
            })
            ->latestOfMany();
    }

    public function pendingReservation()
    {
        return $this->hasOne(StateRouteFeaturedSubscription::class, 'state_route_featured_slot_id')
            ->where('status', 'pending')
            ->where('reserved_until', '>', now())
            ->latestOfMany();
    }

    public function isAvailable(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        $active = $this->relationLoaded('activeSubscription')
            ? $this->activeSubscription
            : $this->activeSubscription()->exists();

        if ($active) {
            return false;
        }

        $reserved = $this->relationLoaded('pendingReservation')
            ? $this->pendingReservation
            : $this->pendingReservation()->exists();

        return ! $reserved;
    }

    public function priceForCycle(string $cycle): int
    {
        return $cycle === 'yearly'
            ? (int) $this->yearly_price_cents
            : (int) $this->monthly_price_cents;
    }

    public function routeName(): string
    {
        $from = $this->fromState->name ?? 'From State';
        $to = $this->toState->name ?? 'To State';

        return $from.' → '.$to;
    }

    public function routeAbv(): string
    {
        $from = $this->fromState->abv ?? '';
        $to = $this->toState->abv ?? '';

        return trim($from.' → '.$to);
    }
}
