<?php

declare(strict_types=1);

namespace App\Support\Core;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->getResponseArray();
    }

    /**
     * @return array
     */
    abstract public function getResponseArray(): array;
}
