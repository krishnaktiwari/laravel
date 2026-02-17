<?php

namespace App\Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jobs extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | Auto Generate Slug
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jobs) {
            $jobs->slug = Str::slug($jobs->title);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scope Published
    |--------------------------------------------------------------------------
    */
    public function scopePublished($query)
    {
        return $query->where('status', true);
    }
}
