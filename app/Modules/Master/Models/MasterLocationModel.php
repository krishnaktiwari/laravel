<?php

namespace App\Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;

class MasterLocationModel extends Model
{
    protected $table = "master_locations";

    protected $fillable = [
        "state",
        "city",
    ];

    public $timestamps = false;

    // Auto-generate slug URL
    public function getSlugAttribute()
    {
        return strtolower(
            str_replace(" ", "-", $this->city)
        );
    }
}
