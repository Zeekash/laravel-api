<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityToStateMoveSizeCost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cityToStateRoute()
    {
        return $this->belongsTo(CityToStateRoute::class, 'city_to_state_route_id');
    }
}
