<?php

namespace App\Http\Controllers\Category;

use App\Exceptions\CustomException;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\ShowRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ShowRequest $request
     * @param int $id
     * @param CategoryService $categoryService
     * @return JsonResponse
     * @throws CustomException
     */
    public function __invoke(ShowRequest $request, int $id, CategoryService $categoryService): JsonResponse
    {
        $customer = $categoryService->getModel(
            $id
        );

        return ApiResponse::data(new CategoryResource($customer));

    }
}
