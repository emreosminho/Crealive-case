<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\IndexRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use App\Traits\HasPagination;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    use HasPagination;
    /**
     * Handle the incoming request.
     *
     * @param IndexRequest $request
     * @param BlogService $BlogService
     * @return JsonResponse
     * @throws CustomException
     */
    public function __invoke(IndexRequest $request, BlogService $blogService): JsonResponse
    {
        $result = $blogService->getModels(
            $request->all()
        );

        return ApiResponse::pagination(BlogResource::collection($result), $this->paginate($result));
    }
}
