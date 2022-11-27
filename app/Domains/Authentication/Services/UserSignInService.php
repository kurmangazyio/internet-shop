<?php

declare(strict_types=1);

namespace App\Domains\Authentication\Services;

use App\Support\Core\BaseResource;
use App\Support\Interfaces\ServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pipeline\Pipeline;

use App\Domains\Authentication\DTO\SignInDto;
use App\Domains\Authentication\Pipes\SignIn\AuthenticateUserPipe;
use App\Domains\Authentication\Pipes\SignIn\ValidateUserPipe;

final class UserSignInService implements ServiceInterface
{
    private array $response = [];

    public function __construct(
        public SignInDto $dto
    ){
    }

    public function getPipes(): array
    {
        return [
            ValidateUserPipe::class,
            AuthenticateUserPipe::class
        ];
    }

    public function handle(): void
    {
        $this->response = app(Pipeline::class)
            ->send($this->dto)
            ->through($this->getPipes())
            ->then(function (SignInDto $dto) {
                return [
                    'token' => $dto->token,
                    'token_type' => $dto->tokenType,
                ];
            });
    }

    public function resource(): BaseResource|AnonymousResourceCollection|array|null
    {
        return $this->response;
    }
}
