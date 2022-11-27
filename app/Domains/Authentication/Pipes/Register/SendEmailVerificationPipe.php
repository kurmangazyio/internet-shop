<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Pipes\Register;

use App\Domains\Authentication\DTO\RegisterDto;
use Closure;

final class SendEmailVerificationPipe
{
    public function handle(RegisterDto $dto, Closure $next)
    {
        // Send email verification to-do

        return $next($dto);
    }
}
