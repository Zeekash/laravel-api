<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcePageFaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resourcePage()
    {
        return $this->belongsTo(ResourcePage::class);
    }
}
