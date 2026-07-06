<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityRouteCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_link',
        'route_name',
        'route_value',
        'city_page_id',
    ];

    public function cityPage()
    {
        return $this->belongsTo(CityPage::class, 'citypage_id');
    }
}
