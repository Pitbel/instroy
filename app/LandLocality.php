<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLocality extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function region()
    {
        return $this->hasOne(LandRegion::class, 'id', 'region_id');
    }
}
