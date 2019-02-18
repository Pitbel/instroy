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
     * @param int|null $localityId
     * @param int $categoryId
     * @param int $limit
     * @param int | bool $pagination
     * @return mixed
     */
    public static function getRecentNews($categoryId = 1, $limit = 3, $localityId = null, $pagination = false)
    {
        $where = [];

        $where['category_id'] = ( ! is_null($categoryId) && !empty($categoryId) ? (int)$categoryId : 1);
        $where['locality_id'] = ( ! is_null($localityId) && !empty($localityId) ? (int)$localityId : null);

        $data = self::where($where)
            ->orderBy('created_at', 'desc');

        if ($limit !== false)
            $data->limit($limit);

        if ($pagination === false)
            return $data->get();

        if ($pagination !== false)
            return $data->paginate($pagination);
    }
}
