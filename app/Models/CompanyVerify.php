<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVerify extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'token'];

    public $table = 'companies_verify';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
