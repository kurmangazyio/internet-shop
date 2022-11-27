<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Support\Traits\ResponseTrait;

/**
 * @OA\Info(
 *      title="internet shop",
 *      version="1.0",
 *      description="",
 *      @OA\Contact(
 *          email="kurmangazykongratbayev@outlook.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * Class Controller.
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait;
}
