<?php

namespace App\Modules\Business\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Business extends Model
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

        static::creating(function ($business) {
            $business->slug = Str::slug($business->title);
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
