<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateToStateRoute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function stateFrom()
    {
        return $this->belongsTo(State::class, 'state_from_id');
    }

    public function stateTo()
    {
        return $this->belongsTo(State::class, 'state_to_id');
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
