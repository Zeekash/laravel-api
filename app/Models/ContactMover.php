<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMover extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resetFlow()
    {
        $this->update([
            'is_follow_up'  => 0,
            'is_bad_lead'   => 0,
            'is_quoted'     => 0,
            'is_not_booked' => 0,
            'is_booked'     => 0,
        ]);
    }

    public function currentStage()
    {
        if ($this->is_booked) return 'booked';
        if ($this->is_not_booked) return 'not_booked';
        if ($this->is_bad_lead) return 'bad_lead';
        if ($this->is_quoted) return 'quoted';
        if ($this->is_follow_up) return 'follow_up';

        return 'new';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
