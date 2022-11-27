<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Authenticate;

use App\Domains\Authentication\Services\UserRegisterService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Domains\Authentication\Request\RegisterRequest;

final class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *     summary="User registration",
     *     path="/api/auth/register",
     *     operationId="register",
     *     tags={"register", "authnetication"},
     *     description="This api is used to register a new user",
     *     @OA\Response(
     *          response=200,
     *          description="User registration successful",
     *          @OA\JsonContent(ref="#/components/schemas/RegisterResponse"),
     *     ),
     * )
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $service = new UserRegisterService(dto: $dto);
        $service->handle();

        $name = $dto->name;
        $surname = $dto->surname;

        return $this->response(
            message: "$name $surname registration successful!",
            data: []
        );
    }
}
