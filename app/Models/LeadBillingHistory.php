<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadBillingHistory extends Model
{
      protected $fillable = [
        'company_id',
        'subscription_id',
        'invoice_no',
        'amount_cents',
        'status',
        'stripe_invoice_id',
        'paid_at',
        'payment_method'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // Helper to get dollar amount
    public function getAmountFormattedAttribute(): string
    {
        return '$' . number_format($this->amount_cents / 100, 2);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subscription()
    {
        return $this->belongsTo(CompanyLeadPlanSubscription::class, 'subscription_id');
    }
}
