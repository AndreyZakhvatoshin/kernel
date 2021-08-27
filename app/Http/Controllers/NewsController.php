<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Находит тип объекта по параметрам из запроса пользователя
     *
     * @return LengthAwarePaginator
     */
    public static function findFromRequest(): LengthAwarePaginator
    {
        $query = ObjectCharacters::select('*')
            ->when($id = request()->input('id'), function ($query, $id) {
                return $query->where('id', $id);
            })->when($off = request()->input('off'), function ($query, $off) {
                return $query->where('off', $off);
            })->when($object_id = request()->input('object_id'), function ($query, $object_id) {
                return $query->where('object_id', $object_id);
            })->when($object_character_type_id = request()->input('object_character_type_id'), function ($query, $object_character_type_id) {
                return $query->where('object_character_type_id', $object_character_type_id);
            })->when($value = request()->input('value'), function ($query, $value) {
                return $query->where('value', 'LIKE', '%' . $value . '%');
            })->when($sort = request()->input('sort'), function ($query, $sort) {
                $sort_direction = Str::startsWith($sort, '-') ? 'DESC' : 'ASC';
                $sort_column = ltrim($sort, '-');
                return $query->orderBy($sort_column, $sort_direction);
            });
        return $query->paginate();
    }
}
