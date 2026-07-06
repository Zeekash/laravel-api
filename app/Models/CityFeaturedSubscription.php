<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityFeaturedSubscription extends Model
{
    protected $fillable = [
        'city_featured_slot_id',
        'city_page_id',
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
        return $this->belongsTo(CityFeaturedSlot::class, 'city_featured_slot_id');
    }

    public function cityPage()
    {
        return $this->belongsTo(CityPage::class, 'city_page_id');
    }

    public function city()
    {
        return $this->cityPage();
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function invoices()
    {
        return $this->hasMany(CityFeaturedSubscriptionInvoice::class, 'city_featured_subscription_id');
    }
}
