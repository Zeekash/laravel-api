<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityToCityMoveSizeCost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cityToCityRoute()
    {
        return $this->belongsTo(CityToCityRoute::class, 'city_to_city_route_id');
    }

}
