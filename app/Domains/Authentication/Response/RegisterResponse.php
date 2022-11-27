<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Response;


use App\Support\Core\BaseResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class RegisterResponse.
 * @mixin RegisterResponse
 * @property mixed surname
 * @property mixed name
 * @OA\Schema(
 *     @OA\Property(
 *          property="name",
 *          type="string"
 *      ),
 *     @OA\Property(
 *          property="surname",
 *          type="string"
 *      ),
 * )
 */

final class RegisterResponse extends BaseResource
{
    #[ArrayShape(['name' => "mixed", 'surname' => "mixed"])]
    public function getResponseArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
        ];
    }
}
