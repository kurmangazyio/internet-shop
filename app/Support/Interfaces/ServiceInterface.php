<?php

declare(strict_types=1);

namespace App\Support\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Support\Core\BaseResource;

interface ServiceInterface
{
    /**
     * @return $this
     */
    public function handle(): void;
    public function getPipes(): array;
    /**
     * @return BaseResource|AnonymousResourceCollection|array|null
     */
    public function resource(): BaseResource|AnonymousResourceCollection|array|null;
}
