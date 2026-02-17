<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
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

        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
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
