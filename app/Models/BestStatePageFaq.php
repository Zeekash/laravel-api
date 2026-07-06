<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestStatePageFaq extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bestStatePage()
    {
        return $this->belongsTo(BestStatePage::class);
    }
}
