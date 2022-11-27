<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Request;

use App\Support\Core\BaseFormRequest;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

use App\Domains\Authentication\DTO\RegisterDto;

/**
 * @OA\Schema(
 *     required={"name", "surname", "email", "password"},
 *     @OA\Property(
 *         property="name",
 *         type="string"
 *      ),
 *     @OA\Property(
 *         property="surname",
 *         type="string"
 *      ),
 *      @OA\Property(
 *         property="email",
 *         type="string"
 *      ),
 *     @OA\Property(
 *         property="password",
 *         type="string"
 *      )
 * )
 * Class RegisterRequest.
 */
final class RegisterRequest extends BaseFormRequest
{
    /**
     * @return array<string, string>
     */
    #[ArrayShape(['name' => "string", 'surname' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): RegisterDto
    {
        $validated = $this->validated();

        $name = Arr::get($validated, 'name');
        $surname = Arr::get($validated, 'surname');
        $email = Arr::get($validated, 'email');
        $password = Arr::get($validated, 'password');

        return new RegisterDto(
            name: $name,
            surname: $surname,
            email: $email,
            password: $password,
        );
    }
}
