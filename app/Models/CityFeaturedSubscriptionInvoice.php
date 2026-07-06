<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityFeaturedSubscriptionInvoice extends Model
{
    protected $fillable = [
        'city_featured_subscription_id',
        'company_id',
        'stripe_invoice_id',
        'amount_paid_cents',
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
        'period_start' => 'datetime',
        'period_end' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function subscription()
    {
        return $this->belongsTo(CityFeaturedSubscription::class, 'city_featured_subscription_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
