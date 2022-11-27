<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Request;

use App\Domains\Authentication\DTO\SignInDto;
use App\Support\Core\BaseFormRequest;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @OA\Schema(
 *     required={"email", "password"},
 *      @OA\Property(
 *         property="email",
 *         type="string"
 *      ),
 *     @OA\Property(
 *         property="password",
 *         type="string"
 *      )
 * )
 * Class SignInRequest.
 */
class SignInRequest extends BaseFormRequest
{
    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): SignInDto
    {
        $validated = $this->validated();

        $email = Arr::get($validated, 'email');
        $password = Arr::get($validated, 'password');

        return new SignInDto(
            email: $email,
            password: $password,
        );
    }
}
