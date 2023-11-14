<?php

namespace App\Http\Controllers\Category;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @param CategoryService $categoryService
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, int $id, CategoryService $categoryService): JsonResponse
    {
        $result=$categoryService->updateModel(
            $id,
            $request->validated()
        );

        return ApiResponse::message($result > 0, $result > 0 ? 'CATEGORY_UPDATED' : 'CATEGORY_NOT_UPDATED');

    }
}
