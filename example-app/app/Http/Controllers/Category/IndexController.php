<?php

namespace App\Http\Controllers\Category;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\IndexRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use App\Models\Category as CategoryModel;
use App\Traits\HasPagination;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    use HasPagination;
    /**
     * Handle the incoming request.
     *
     * @param IndexRequest $request
     * @param CategoryService $categoryService
     * @return JsonResponse
     * @throws CustomException
     */
    public function __invoke(IndexRequest $request, CategoryService $categoryService): JsonResponse
    {
        $result = $categoryService->getModels(
            $request->all()
        );

        return ApiResponse::pagination(CategoryResource::collection($result), $this->paginate($result));
    }
}

