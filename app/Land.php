<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    public static function getSimilarLandFromCategory($limit = 3, $category_id = null)
    {
        if(!is_null($category_id)) {
            return self::where('category_id', $category_id)->orderBy('created_at', 'DESC')->inRandomOrder()->limit($limit)->get();
        } else {
            return self::where('category_id', '!=', null)->orderBy('created_at', 'DESC')->inRandomOrder()->limit($limit)->get();
        }
    }

    public static function getLandsListBySlug($slug, $perPage = 10)
    {
        try {
            $catId = self::getCatIdBySlug($slug);
            $lands = Land::where('category_id', $catId)
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } catch (\Exception $e) {
            abort(404);
        }

        return $lands;
    }

    /**
     * Get category id by slug
     *
     * @param $slug
     * @return mixed
     */
    public static function getCatIdBySlug($slug)
    {
        return Category::where('slug', $slug)->first()->id;
    }

    public static function getCategoryNameBySlug($slug)
    {
        return Category::where('slug', $slug)->first()->name;
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function type()
    {
        return $this->hasOne(LandType::class, 'id', 'type_id');
    }

    public function images()
    {
        return $this->hasMany(LandImages::class, 'land_id', 'id');
    }

    public function locality()
    {
        return $this->hasOne(LandLocality::class, 'id', 'locality_id');
    }

    public function land_category()
    {
        return $this->hasOne(LandCategory::class, 'id', 'land_category_id');
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'id', 'assignment_id');
    }
}
