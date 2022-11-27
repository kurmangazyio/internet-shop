<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Pipes\SignIn;

use Closure;
use App\Models\User;
use App\Domains\Authentication\DTO\SignInDto;

class AuthenticateUserPipe
{
    public function handle(SignInDto $dto, Closure $next)
    {
        $user = User::getUser($dto->email);
        $dto->token = $user->createToken("API TOKEN")->plainTextToken;

        return $next($dto);
    }
}
