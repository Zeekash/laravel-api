<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeSetting extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'is_enabled',
        'amount_cents',
        'currency',
        'description_for_partners'
    ];

    public static function current(): self
    {
        return static::query()->first() ?? static::query()->create([
            'is_enabled' => true,
            'amount_cents' => 1500,
            'currency' => 'USD',
            'description_for_partners' => 'One-time activation fee to list your moving company.',
        ]);
    }
}