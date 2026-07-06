<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateToStateMoveSizeCost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stateToStateRoute()
    {
        return $this->belongsTo(StateToStateRoute::class, 'state_to_state_route_id');
    }
}
