<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityToCityRoute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function cityFrom()
    {
        return $this->belongsTo(CityPage::class, 'city_from_id','id');
    }
    
    public function cityTo()
    {
        return $this->belongsTo(CityPage::class, 'city_to_id','id');
    }

    public function stateFrom()
    {
        return $this->hasOneThrough(State::class, CityPage::class, 'id', 'id', 'city_from_id', 'state_id');
    }

    public function stateTo()
    {
        return $this->hasOneThrough(State::class, CityPage::class, 'id', 'id', 'city_to_id', 'state_id');
    }
    
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'create_by_id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id');
    }
}
