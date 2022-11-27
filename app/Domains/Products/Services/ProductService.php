<?php


namespace App\Domains\Products\Services;


use App\Domains\Products\DTO\ProductDto;
use App\Support\Core\BaseResource;
use App\Support\Interfaces\ServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pipeline\Pipeline;

class ProductService implements ServiceInterface
{
    public ProductDto $dto;
    public array $response = [];

    public function __construct(ProductDto $dto){
        $this->dto = $dto;
    }

    public function getPipes(): array
    {
        return [

        ];
    }

    public function handle(): void
    {
        $this->response = app(Pipeline::class)
            ->send($this->dto)
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
