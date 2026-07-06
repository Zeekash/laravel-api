<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Company $company) {
            if (empty($company->slug)) {
                $company->slug = $company->createUniqueSlug($company->company_name);
            }
        });
    }

    private function createUniqueSlug(string $company_name): string
    {
        $baseSlug = Str::slug($company_name);
        $slug = $baseSlug;
        $i = 1;

        while (static::where('slug', $slug)->exists()) {
            $i++;
            $slug = $baseSlug . '-' . $i;
        }
        return $slug;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function users()
    {
        return $this->hasMany('App\User', 'company_id', 'id');
    }
    public function contact()
    {
        return $this->hasMany(ContactUs::class);
    }
    public function companyInfo()
    {
        return $this->hasMany(CompanyInfo::class);
    }
    public function disputes()
    {
        return $this->hasMany(Dispute::class);
    }

    public function verifiedUsers()
    {
        return $this->hasMany('App\User', 'company_id', 'id')
            ->where('user_email_verified', 1)
            ->whereNull('deleted_at');
    }

    public function stateFeaturedSubscriptions()
    {
        return $this->hasMany(\App\Models\StateFeaturedSubscription::class);
    }
}
