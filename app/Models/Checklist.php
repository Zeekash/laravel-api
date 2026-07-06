<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function category()
    {
        return $this->belongsTo(ChecklistCategory::class,'checklist_category_id','id');
    }
}
