<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateRouteFeaturedSubscription extends Model
{
    protected $fillable = [
        'state_route_featured_slot_id',
        'from_state_id',
        'to_state_id',
        'company_id',
        'billing_cycle',
        'price_cents',
        'discount_percent',
        'status',
        'reserved_until',
        'starts_at',
        'ends_at',
        'cancel_at_period_end',
        'canceled_at',
        'stripe_customer_id',
        'stripe_subscription_id',
        'stripe_product_id',
        'stripe_price_id',
        'stripe_latest_invoice_id',
    ];

    protected $casts = [
        'price_cents' => 'integer',
        'discount_percent' => 'integer',
        'reserved_until' => 'datetime',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancel_at_period_end' => 'boolean',
        'canceled_at' => 'datetime',
    ];

    public function slot()
    {
        return $this->belongsTo(StateRouteFeaturedSlot::class, 'state_route_featured_slot_id');
    }

    public function fromState()
    {
        return $this->belongsTo(State::class, 'from_state_id');
    }

    public function toState()
    {
        return $this->belongsTo(State::class, 'to_state_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function invoices()
    {
        return $this->hasMany(StateRouteFeaturedSubscriptionInvoice::class, 'state_route_featured_subscription_id');
    }

    public function routeName(): string
    {
        $from = $this->fromState->name ?? 'From State';
        $to = $this->toState->name ?? 'To State';

        return $from.' → '.$to;
    }
}
