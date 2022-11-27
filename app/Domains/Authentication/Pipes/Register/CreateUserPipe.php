<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Pipes\Register;

use Closure;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Domains\Authentication\DTO\RegisterDto;
use App\Support\Core\CustomException;

final class CreateUserPipe
{
    public function handle(RegisterDto $dto, Closure $next)
    {
        $user = User::createUser(
            name: $dto->name,
            surname: $dto->surname,
            email: $dto->email,
            password: Crypt::encryptString($dto->password)
        );

        if(!$user) {
            new CustomException('User could not be created', 400, []);
        }

        return $next($dto);
    }
}
