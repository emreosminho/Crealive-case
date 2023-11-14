<?php

namespace App\Http\Controllers\Blog;

use App\Exceptions\CustomException;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\ShowRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ShowRequest $request
     * @param int $id
     * @param BlogService $blogService
     * @return JsonResponse
     * @throws CustomException
     */
    public function __invoke(ShowRequest $request, int $id, BlogService $blogService): JsonResponse
    {
        $order = $blogService->getModel(
            $id
        );

        return ApiResponse::data(new BlogResource($order));

    }
}

