<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Authenticate;

use App\Domains\Authentication\Services\UserSignInService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Domains\Authentication\Request\SignInRequest;

final class SignInController extends Controller
{
    /**
     * @OA\Post(
     *     summary="User sign in",
     *     path="/api/auth/sign-in",
     *     operationId="sign-in",
     *     tags={"sign-in", "authnetication"},
     *     description="This api is used to sign-in a user",
     *     @OA\Response(
     *          response=200,
     *          description="User registration successful",
     *          @OA\JsonContent(ref="#/components/schemas/SignInResponse"),
     *     ),
     * )
     * @param SignInRequest $request
     * @return JsonResponse
     */
    public function __invoke(SignInRequest $request): JsonResponse
    {
        $service = new UserSignInService(dto: $request->toDto());
        $service->handle();
        $resource = $service->resource();

        return $this->response(
            message: "User authenticated successfully!",
            data: $resource
        );
    }
}
