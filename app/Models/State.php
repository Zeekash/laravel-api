<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($state) {
            $state->slug = $state->createSlug($state->name);
            $state->save();
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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function company()
    {
        return $this->hasMany(Company::class);
    }
    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function stateProCons()
    {
        return $this->hasMany(StateProCon::class);
    }

    public function stateToStateRoutes()
    {
        return $this->hasMany(StateToStateRoute::class, 'state_from_id');
    }

    public function stateToCityRoutes()
    {
        return $this->hasMany(StateToCityRoute::class, 'state_from_id');
    }
    public function featuredSlots()
    {
        return $this->hasMany(\App\Models\StateFeaturedSlot::class);
    }
}
