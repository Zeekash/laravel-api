<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    public function itemcalculate()
    {
        return $this->hasMany(ItemCalculate::class);
    }
}
