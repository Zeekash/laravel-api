<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateToCityMoveSizeCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_to_city_route_id',
        'moving_company_studio_bedroom',
        'moving_container_studio_bedroom',
        'rental_truck_studio_bedroom',
        'moving_company_2_3_bedroom',
        'moving_container_2_3_bedroom',
        'rental_truck_2_3_bedroom',
        'moving_company_4_bedroom',
        'moving_container_4_bedroom',
        'rental_truck_4_bedroom',
    ];

    /**
     * Relationship to StateToCityRoute
     */
    public function stateToCityRoute()
    {
        return $this->belongsTo(StateToCityRoute::class, 'state_to_city_route_id');
    }
}
