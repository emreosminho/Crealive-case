<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @param BlogService $blogService
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request, BlogService $blogService): JsonResponse
    {
        $result = $blogService->storeModel(
            $request->validated()
        );

        return ApiResponse::message(true, 'BLOG_CREATED', new BlogResource($result));

    }
}
