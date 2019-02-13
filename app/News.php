<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'category_id');
    }

    /**
     * Get recent news
     *
     * @param int $limit
     * @return mixed
     */
    public static function getRecentNews($limit = 3)
    {
        return self::orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
