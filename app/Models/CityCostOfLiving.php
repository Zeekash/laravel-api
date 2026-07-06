<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCostOfLiving extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cityPage()
    {
        return $this->belongsTo(CityPage::class);
    }
}
