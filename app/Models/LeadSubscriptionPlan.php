<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LeadSubscriptionPlan extends Model
{
    use HasFactory;
     protected $fillable = [
        'name','slug','description',
        'leads_per_month','extra_lead_fee_cents',
        'monthly_price_cents','annual_price_cents',
        'target_audience','included_features',
        'icon','color','display_order','is_active',
        'stripe_product_id',
        'stripe_monthly_price_id','stripe_monthly_price_cents',
        'stripe_annual_price_id','stripe_annual_price_cents',
    ];

    protected static function booted()
    {
        static::saving(function ($plan) {
            if (blank($plan->slug) && filled($plan->name)) {
                $plan->slug = Str::slug($plan->name);
            }
        });
    }

    public function featuresArray(): array
    {
        if (blank($this->included_features)) return [];
        return collect(preg_split("/\r\n|\n|\r/", $this->included_features))
            ->map(fn($x) => trim($x))
            ->filter()
            ->values()
            ->all();
    }

    public function monthlyPriceDollars(): string
    {
        return number_format($this->monthly_price_cents / 100, 2);
    }

    public function annualPriceDollars(): string
    {
        return number_format($this->annual_price_cents / 100, 2);
    }

}
