<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $guarded = [];

    public static function getSimilarLandFromCategory($limit = 3, $category_id = null)
    {
        if(!is_null($category_id)) {
            return self::where('category_id', $category_id)->orderBy('created_at', 'DESC')->inRandomOrder()->limit($limit)->get();
        } else {
            return self::where('category_id', '!=', null)->orderBy('created_at', 'DESC')->inRandomOrder()->limit($limit)->get();
        }
    }

    /**
     * Get list of land by slug
     *
     * @param $slug
     * @param int $perPage
     */
    public static function getLandsListBySlug($slug, $perPage = 10)
    {
        try {
            $catId = self::getCatIdBySlug($slug);
            $lands = self::where('category_id', $catId)
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } catch (\Exception $e) {
            return abort(404);
        }

        return $lands;
    }

    /**
     * Get json list of land for main map
     */
    public static function getLandsForMap()
    {
        $lands = self::where('geo_location', '!=', null)
            ->select('id', 'geo_location', 'name', 'address', 'price')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach($lands as $land) {
            $dataArray[] = [
                'id' => 'marker-' . $land->id,
                'land_id' => $land->id,
                'center' => explode(",", $land->geo_location),
                'icon' => '<i class="fa fa-home"></i>',
                'title'=> $land->name,
                'desc'=> $land->address,
                'price'=> number_format($land->price, 0, '', ' ') . '₽',
                'image'=> $land->images[0]->img_link ?? '',
            ];
        }

        return $dataArray;
    }

    /**
     * Get last inserted id
     *
     * @return mixed
     */
    public static function getLastId()
    {
        return self::orderBy('id', 'desc')->first()->id;
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

    /**
     * Get list of lands by string date
     *
     * @param string $stringDate
     * @return mixed
     * @throws \Exception
     */
    public static function getLandsByStringDate(string $stringDate = '1 month')
    {
        $now = Carbon::now();

        if (str_contains($stringDate, ['days', 'day'])) {
            $stringDate = $now->subDays((int)$stringDate);
        } elseif (str_contains($stringDate, 'month', 'months')) {
            $stringDate = $now->subMonths((int)$stringDate);
        } elseif (str_contains($stringDate, 'year', 'years')) {
            $stringDate = $now->subYears((int)$stringDate);
        } else {
            throw new \ErrorException('Wrong date string format. Must be, for example: n days, n months, n years"');
        }

        return self::where('created_at', '>=' ,$stringDate)->get();
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
