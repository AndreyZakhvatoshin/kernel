<?php

namespace App\Http\Controllers;

use App\Helpers\NewsHelper;
use App\Http\Resources\CurentNewsResource;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NewsResource::collection(NewsHelper::findFromRequest());
    }

    /**
     * @param int $id
     * @return CurentNewsResource
     */
    public function show(int $id): CurentNewsResource
    {
        return new CurentNewsResource(News::findOrFail($id));
    }
}
