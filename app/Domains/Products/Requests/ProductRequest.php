<?php

declare(strict_types=1);

namespace App\Domains\Products\Requests;

use App\Domains\Products\DTO\ProductDto;
use App\Support\Core\BaseFormRequest;
use Illuminate\Support\Arr;

class ProductRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'filterByCategory' => 'string',
            'filterByPrice' => 'number',
            'filterByCustom' => 'string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): ProductDto
    {
        $validated = $this->validated();

        $filterByCategory = Arr::get($validated, 'filterByCategory') || null;
        $filterByPrice = Arr::get($validated, 'filterByPrice') || null;
        $filterByCustom = Arr::get($validated, 'filterByCustom') || null;

        return new ProductDto(
            $filterByCustom,
            $filterByPrice,
            $filterByCategory
        );
    }
}
