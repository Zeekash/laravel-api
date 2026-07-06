<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLeadUsage extends Model
{
   protected $fillable = [
        'company_id',
        'lead_subscription_plan_id',
        'leads_allowed',
        'leads_used',
        'period_start',
        'period_end',
    ];

    public function remaining(): int
    {
        return max(0, $this->leads_allowed - $this->leads_used);
    }
}