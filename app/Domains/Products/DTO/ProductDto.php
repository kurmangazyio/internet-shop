<?php


namespace App\Domains\Products\DTO;


class ProductDto
{
    public function __construct(
        public string|null|bool $filterByCustom,
        public int|null|bool $filterByPrice,
        public string|null|bool $filterByCategory,
    ) {
    }
}
