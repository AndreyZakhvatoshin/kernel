<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NewsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\Admin\CurentNewsResource;
use App\Http\Resources\Admin\NewsResource;
use App\Models\News;
use Symfony\Component\HttpFoundation\Response;


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

    /**
     * @param CreateNewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateNewsRequest $request): \Illuminate\Http\JsonResponse
    {
        $news = News::create($request->all());
        return response()->json(['data' => new CurentNewsResource($news)], Response::HTTP_CREATED);
    }


    /**
     * @param UpdateNewsRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateNewsRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return response()->json(['data' => new CurentNewsResource($news)], Response::HTTP_OK);
    }
}
