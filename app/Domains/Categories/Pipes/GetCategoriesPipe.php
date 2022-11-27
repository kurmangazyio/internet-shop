<?php

declare(strict_types=1);

namespace App\Domains\Categories\Pipes;

use Closure;
use App\Models\Category;

final class GetCategoriesPipe
{
    public function handle(array $resource, Closure $next)
    {
        $categories = Category::all();
        $resource['categories'] = $categories->toArray();

        return $next($resource);
    }
}
