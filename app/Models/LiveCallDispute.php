<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveCallDispute extends Model
{
    use HasFactory;

    public function liveCall()
    {
        return $this->belongsTo(LiveCall::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
