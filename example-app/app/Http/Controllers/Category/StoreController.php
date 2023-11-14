<?php

namespace App\Http\Controllers\Category;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @param StoreService $StoreService
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request, CategoryService $categoryService): JsonResponse
    {
        $result = $categoryService->storeModel(
            $request->validated()
        );

        return ApiResponse::message(true, 'CATEGORY_CREATED', new CategoryResource($result));

    }
}
