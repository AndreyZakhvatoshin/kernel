<?php

namespace App\Helpers;

use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsHelper
{
    /**
     * Находит новость по параметрам из запроса
     *
     * @return LengthAwarePaginator
     */
    public static function findFromRequest(): LengthAwarePaginator
    {
        $query = News::select('*')
            ->when($title = request()->input('title'), function ($query, $title) {
                return $query->where('title', 'LIKE', '%' . $title . '%');
            })->when($body = request()->input('body'), function ($query, $body) {
                return $query->where('body', 'LIKE', '%' . $body . '%');
            })->when($status = request()->input('status'), function ($query, $status) {
                return $query->where('status', 'LIKE', '%' . $status . '%');
            })->when($sort = request()->input('sort'), function ($query, $sort) {
                $sort_direction = Str::startsWith($sort, '-') ? 'DESC' : 'ASC';
                $sort_column = ltrim($sort, '-');
                return $query->orderBy($sort_column, $sort_direction);
            });
        return $query->paginate();
    }
}
