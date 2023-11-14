<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param LoginRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     * @throws CustomException
     */

     public function __invoke(LoginRequest $request, AuthService $authService): JsonResponse
     {
         $token = $authService->login($request->validated());
 
         return ApiResponse::data([
             'data' => new AuthResource($authService->getAuthUser()),
             'access_token' => $token,
             'type' => 'Bearer'
         ]);
     }

}
