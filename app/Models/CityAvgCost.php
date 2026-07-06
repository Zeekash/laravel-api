<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityAvgCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'avg_cost',
        'cost_hour',
        'city_page_id',
    ];

    public function cityPage()
    {
        return $this->belongsTo(CityPage::class);
    }
}
