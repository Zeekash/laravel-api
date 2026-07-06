<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyListingFee extends Model
{
    use HasFactory;

     protected $fillable = [
        'company_id',
        'provider',
        'type',
        'amount_cents',
        'currency',
        'status',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'paid_at',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
