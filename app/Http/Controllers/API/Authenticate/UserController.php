<?php

namespace App\Http\Controllers\API\Authenticate;

use App\Domains\Authentication\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     summary="User info",
     *     path="/api/auth/user",
     *     operationId="user-info",
     *     tags={"user-info", "authnetication"},
     *     description="This api is used to get info about authenticated user",
     *     @OA\Response(
     *          response=200,
     *          description="User info retrieval successfully",
     *          @OA\JsonContent(ref="#/components/schemas/SignInResponse"),
     *     ),
     * )
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $service = new UserService();
        $service->handle();
        $resource = $service->resource();

        return $this->response(
            message: "User info retrieval successfully!",
            data: $resource
        );
    }
}
