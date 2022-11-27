<?php

namespace App\Http\Controllers\API\Products;

use App\Domains\Products\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    //
    /**
     * @OA\Post(
     *     summary="Get Products",
     *     path="/api/products",
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
    public function __invoke(ProductRequest $request): JsonResponse
    {
        $service = new ProductService($request->toDto);
        $service->handle();
        $resource = $service->resource();

        return $this->response(
            message: "User info retrieval successfully!",
            data: $resource
        );
    }
}
