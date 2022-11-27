<?php


namespace App\Http\Controllers\API\Categories;


use App\Domains\Categories\Services\CategoriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @OA\Post(
     *     summary="Get Categories",
     *     path="/api/categories",
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
        $service = new CategoriesService();
        $service->handle();
        $resource = $service->resource();

        return $this->response(
            message: "User info retrieval successfully!",
            data: $resource
        );
    }
}
