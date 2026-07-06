<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLeadPlanSubscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'lead_subscription_plan_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'interval',
        'status',
        'cancel_at_period_end',
        'current_period_end',
        'cancelled_at',
    ];

    protected $casts = [
        'cancel_at_period_end' => 'boolean',
        'current_period_end' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function plan()
    {
        return $this->belongsTo(LeadSubscriptionPlan::class, 'lead_subscription_plan_id');
    }

    public function isActive(): bool
    {
        return in_array($this->status, ['active', 'trialing'], true);
    }

    public function billingHistories()
    {
        return $this->hasMany(LeadBillingHistory::class, 'subscription_id');
    }
}