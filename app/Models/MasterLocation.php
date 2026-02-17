<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class MasterLocation extends Model
{
    use HasFactory;

    protected $table = 'master_locations';

    protected $fillable = [
        'state',
        'city',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessor: Generate Slug (city-state)
    |--------------------------------------------------------------------------
    | Example:
    | Andhra Pradesh + Anakapalli
    | → anakapalli-andhra-pradesh
    */
    public function getSlugAttribute()
    {
        return Str::slug($this->city . '-' . $this->state);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor: Full Name
    |--------------------------------------------------------------------------
    */
    public function getFullNameAttribute()
    {
        return $this->city . ', ' . $this->state;
    }
}
