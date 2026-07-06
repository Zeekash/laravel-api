<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateCostOfLiving extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'average_rent_cost',
        'average_home_cost',
        'average_income_per_capita',
        'cost_of_living_single',
        'cost_of_living_family_of_four',
        'unemployment_rate',
        'sales_tax',
        'state_income_tax',
    ];

      public function state()
    {
        return $this->belongsTo(State::class);
    }

}
