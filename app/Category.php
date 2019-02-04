<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function scopeSubCategory($query, $withSubCat = true) {
        return $query->orderBy('id', 'asc')
            ->where('subcat_id', 0);
    }

    public function lands()
    {
        return $this->hasMany(Land::class, 'category_id', 'id');
    }
}
