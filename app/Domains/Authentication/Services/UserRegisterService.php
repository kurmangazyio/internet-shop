<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pipeline\Pipeline;

use App\Domains\Authentication\DTO\RegisterDto;
use App\Support\Core\BaseResource;
use App\Support\Interfaces\ServiceInterface;

use App\Domains\Authentication\Pipes\Register\SendEmailVerificationPipe;
use App\Domains\Authentication\Pipes\Register\CreateUserPipe;
use App\Domains\Authentication\Pipes\Register\ValidateNewUserPipe;

class UserRegisterService implements ServiceInterface
{
    public function __construct(
        public RegisterDto $dto
    ){
    }

    public function getPipes(): array
    {
        return [
            ValidateNewUserPipe::class,
            CreateUserPipe::class,
            SendEmailVerificationPipe::class,
        ];
    }

    public function handle(): void
    {
        app(Pipeline::class)
            ->send($this->dto)
            ->through($this->getPipes())
            ->then(function (RegisterDto $dto) { });
    }

    public function resource(): BaseResource|AnonymousResourceCollection|array|null
    {
        return null;
    }
}
