<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
  
        static::created(function ($country) {
            $country->slug = $country->createSlug($country->name);
            $country->save();
        });
    }
  
    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereCompanyName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
