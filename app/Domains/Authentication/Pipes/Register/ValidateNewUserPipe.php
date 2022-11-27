<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Pipes\Register;

use App\Domains\Authentication\DTO\RegisterDto;
use App\Support\Core\CustomException;

use Closure;
use App\Models\User;

final class ValidateNewUserPipe
{
    public function handle(RegisterDto $dto, Closure $next)
    {
        if (User::hasUser($dto->email)) {
            new CustomException('User already exists', 400, []);
        }

        return $next($dto);
    }
}
