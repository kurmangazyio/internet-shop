<?php

declare(strict_types=1);

namespace App\Domains\Authentication\DTO;

final class RegisterDto
{
    public function __construct(
        public string $name,
        public string $surname,
        public string $email,
        public string $password,
    ) {
    }
}
