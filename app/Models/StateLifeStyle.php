<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateLifeStyle extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'state_id',
    'population',
    'political_leaning',
    'summer_high',
    'winter_low',
    'annual_rain',
    'annual_snow',
    'crime_index',
    'transportation_score',
    'walkability_score',
    'bike_friendliness_score'
];
public function state()
    {
        return $this->belongsTo(State::class);
    }
}

