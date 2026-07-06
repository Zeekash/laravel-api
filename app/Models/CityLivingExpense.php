<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityLivingExpense extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function cityPage()
    {
        return $this->belongsTo(CityPage::class);
    }
}
