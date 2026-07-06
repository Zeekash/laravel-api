<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function publishBy()
    {
        return $this->belongsTo(Admin::class,'publish_by','id');
    }

    public function featuredSlots()
    {
        return $this->hasMany(ResourceFeaturedSlot::class, 'resource_page_id')->orderBy('slot_number');
    }

    public function featuredSubscriptions()
    {
        return $this->hasMany(ResourceFeaturedSubscription::class, 'resource_page_id');
    }
}
