<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by_id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id');
    }

    public function cityToCityRoutes()
    {
        return $this->hasMany(CityToCityRoute::class, 'city_from_id');
    }

    public function cityToStateRoutes()
    {
        return $this->hasMany(CityToStateRoute::class, 'city_from_id');
    }

    public function featuredSlots()
    {
        return $this->hasMany(CityFeaturedSlot::class, 'city_page_id')->orderBy('slot_number');
    }

    public function featuredSubscriptions()
    {
        return $this->hasMany(CityFeaturedSubscription::class, 'city_page_id');
    }
}
