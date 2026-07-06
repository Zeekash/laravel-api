<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'approved_at' => 'datetime',
        'payment_due_at' => 'datetime',
        'paid_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->where('is_published', 1)->orderBy('id', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->where('is_published', 1)->orderBy('id', 'desc')->first();
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $post->slug = $post->createSlug($post->title);
            $post->save();
        });
    }
    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {

            $max = static::whereCompanyName($title)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function company()
    {
        return  $this->belongsTo(Company::class);
    }
    public function postCategory()
    {
        return  $this->belongsTo(PostCategory::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }
    public function postVisit()
    {
        return $this->hasMany(PostVisit::class, 'post_id', 'id');
    }

    public function scopeScheduledForPublish($query)
    {
        // Get the current date and time up to the minute
        $currentDateTime = Carbon::now()->format('Y-m-d H:i');

        return $query->whereRaw("DATE_FORMAT(published_at, '%Y-%m-%d %H:%i') = ?", [$currentDateTime])
            ->where('is_published', false);
    }

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id');
    }

    public function restoredBy()
    {
        return $this->belongsTo(Admin::class, 'restored_by_id');
    }

    public function getPriceFormattedAttribute()
    {
        return '$' . number_format((float) $this->price, 2);
    }

    public function getWordCountAttribute()
    {
        return str_word_count(strip_tags($this->body ?? ''));
    }

    public function getSeoCompleteAttribute()
    {
        return !empty($this->title)
            && !empty($this->meta_description)
            && !empty($this->meta_keywords)
            && !empty($this->image)
            && $this->word_count >= 300;
    }
}
