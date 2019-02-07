<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandRegion extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function localities()
    {
        return $this->hasMany(LandLocality::class, 'region_id', 'id');
    }
}
