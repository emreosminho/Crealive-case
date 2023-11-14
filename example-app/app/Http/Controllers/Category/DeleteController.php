<?php

namespace App\Http\Controllers\Category;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param DeleteRequest $request
     * @param int $id
     * @param CustomerManager $customerManager
     * @return JsonResponse
     */
    public function __invoke(DeleteRequest $request, int $id, CategoryService $categoryService): JsonResponse
    {
        $result = $categoryService->deleteModelById(
            $id
        );

        return ApiResponse::message($result > 0, $result > 0 ? 'CATEGORY' : 'CATEGORY_NOT_DELETED');

    }
}
