<?php


namespace App\Domains\Authentication\Services;

use App\Support\Core\CustomException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Support\Core\BaseResource;
use App\Support\Interfaces\ServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements ServiceInterface
{
    private array $resource = [];

    public function getPipes(): array
    {
        return [];
    }

    public function handle(): void
    {
        $user = Auth::user();

        if(
            !$user &&
            isset($user->name) &&
            isset($user->surname) &&
            isset($user->email) &&
            isset($user->created_at) &&
            isset($user->updated_at)
        ) {
            new CustomException("User not found", 400, []);
        }

        $this->resource = [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }

    public function resource(): BaseResource|AnonymousResourceCollection|array|null
    {
        return $this->resource;
    }
}
