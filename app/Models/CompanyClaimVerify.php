<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyClaimVerify extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'token','created_at'];

    public $table = 'companies_claim_verify';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
