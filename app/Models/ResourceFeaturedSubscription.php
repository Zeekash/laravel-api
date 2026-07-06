<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceFeaturedSubscription extends Model
{
    protected $fillable = [
        'resource_featured_slot_id',
        'resource_page_id',
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
        return $this->belongsTo(ResourceFeaturedSlot::class, 'resource_featured_slot_id');
    }

    public function resourcePage()
    {
        return $this->belongsTo(ResourcePage::class, 'resource_page_id');
    }

    public function resource()
    {
        return $this->resourcePage();
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function invoices()
    {
        return $this->hasMany(ResourceFeaturedSubscriptionInvoice::class, 'resource_featured_subscription_id');
    }
}
