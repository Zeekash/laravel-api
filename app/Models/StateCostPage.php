<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateCostPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'local_moving_company_cost',
        'interstate_moving_company_cost',
        'moving_containers_cost',
        'cost_to_rent_moving_truck',
        'factors_that_affect_the_cost',
        'simple_ways_to_save_money',
        'cheapest_way_to_move',
        'most_accurate_moving_quote',
        'state_id',
    ];
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
