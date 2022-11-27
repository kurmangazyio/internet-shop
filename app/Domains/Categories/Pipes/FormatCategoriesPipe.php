<?php

declare(strict_types=1);

namespace App\Domains\Categories\Pipes;

use App\Domains\Categories\Support\CategoriesFormatter;
use Closure;

final class FormatCategoriesPipe
{
    public function handle(array $resource, Closure $next)
    {
        if (empty($resource)) {
            return $next($resource);
        }

        $formatter = new CategoriesFormatter($resource['categories']);
        $formattedCategories = $formatter->format();

        $resource['categories'] = $formattedCategories;

        return $next($resource);
    }
}
