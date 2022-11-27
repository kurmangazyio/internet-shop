<?php

declare(strict_types=1);

namespace App\Domains\Authentication\DTO;

class SignInDto
{
    public function __construct(
        public string $email,
        public string $password,
        public string|null $token = null,
        public string|null $tokenType = 'Bearer'
    ) {
    }
}
