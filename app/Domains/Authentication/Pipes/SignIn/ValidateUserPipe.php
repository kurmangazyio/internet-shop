<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Pipes\SignIn;

use Closure;
use App\Models\User;
use App\Support\Core\CustomException;
use App\Domains\Authentication\DTO\SignInDto;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

final class ValidateUserPipe
{
    public function handle(SignInDto $dto, Closure $next)
    {
        if (!User::hasUser($dto->email)) {
            new CustomException('User does not exists', 400, []);
        }

        $user = User::getUser($dto->email);

        try {
            $password = Crypt::decryptString($user->password);
        } catch (DecryptException $e) {
            $message = $e->getMessage();
            new CustomException("Password validation failure! $message", 400, []);
        }

        if(isset($password) && ($password !== $dto->password)) {
            new CustomException('Password does not match', 400, []);
        }

        return $next($dto);
    }
}
