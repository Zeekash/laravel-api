<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_category_id', 'id');
    }

    public function itemcalculate()
    {
        return $this->hasMany(ItemCalculate::class);
    }
}
