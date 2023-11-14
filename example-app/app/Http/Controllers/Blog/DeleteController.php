<?php

namespace App\Http\Controllers\Blog;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\DeleteRequest;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param DeleteRequest $request
     * @param int $id
     * @param BlogService $blogService
     * @return JsonResponse
     */
    public function __invoke(DeleteRequest $request, int $id, BlogService $blogService): JsonResponse
    {
        $result = $blogService->deleteModelById(
            $id
        );

        return ApiResponse::message($result > 0, $result > 0 ? 'BLOG_DELETED' : 'BLOG_NOT_DELETED');

    }
}
