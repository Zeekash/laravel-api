<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveCall extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function liveCallDispute()
    {
        return $this->hasOne(LiveCallDispute::class, 'live_call_id');
    }

    
}
