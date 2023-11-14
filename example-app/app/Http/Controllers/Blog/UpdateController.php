<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\UpdateRequest;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @param BlogService $blogService
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, int $id, BlogService $blogService): JsonResponse
    {
        $result=$blogService->updateModel(
            $id,
            $request->validated()
        );

        return ApiResponse::message($result > 0, $result > 0 ? 'BLOG_UPDATED' : 'BLOG_NOT_UPDATED');

    }
}
