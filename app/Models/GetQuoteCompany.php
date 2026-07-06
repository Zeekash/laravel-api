<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetQuoteCompany extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function getQuote()
    {
        return $this->belongsTo(GetQuote::class);
    }
}
