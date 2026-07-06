<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateToCityRoute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'miles',
        'min_cost',
        'max_cost',
        'upper_content',
        'middle_content',
        'bottom_content',
        'state_from_id',
        'city_to_id',
        'create_by_id',
    ];

    // protected $casts = [
    //     'miles' => 'float',
    // ];
    
    public function stateFrom()
    {
        return $this->belongsTo(State::class, 'state_from_id');
    }

    public function cityTo()
    {
        return $this->belongsTo(CityPage::class, 'city_to_id');
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
