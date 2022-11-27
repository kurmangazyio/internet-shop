<?php

declare(strict_types=1);

namespace App\Domains\Categories\Services;

use App\Domains\Categories\Pipes\GetCategoriesPipe;
use App\Domains\Categories\Pipes\FormatCategoriesPipe;

use App\Support\Core\BaseResource;
use App\Support\Interfaces\ServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pipeline\Pipeline;

class CategoriesService implements ServiceInterface
{
    public function __construct(
        public array $response = []
    ){
    }

    public function getPipes(): array
    {
        return [
            GetCategoriesPipe::class,
            FormatCategoriesPipe::class,
        ];
    }

    public function handle(): void
    {
        $this->response = app(Pipeline::class)
            ->send($this->response)
            ->through($this->getPipes())
            ->then(function ($resourceFromPipe) {
                return $resourceFromPipe;
            });
    }

    public function resource(): BaseResource|AnonymousResourceCollection|array|null
    {
        return $this->response;
    }
}
