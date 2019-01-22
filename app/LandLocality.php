<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLocality extends Model
{
    public function region()
    {
        return $this->hasOne(LandRegion::class, 'id', 'region_id');
    }
}
