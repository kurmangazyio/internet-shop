<?php


namespace App\Domains\Categories\Support;


use App\Models\Category;

class CategoriesFormatter
{
    public array $categories = [];

    public function __construct(array $categories){
        $this->categories = $categories;
    }

    public function getAllChildren(int $parentId): array
    {
        $children = [];
        foreach ($this->categories as $category) {
            if ($category['parent_id'] === $parentId) {
                $category['children'] = $this->getAllChildren($category['id']);
                $children[] = $category;
            }
        }

        return $children;
    }

    public function getAllParents(): array
    {
        $parents = [];
        foreach ($this->categories as $category) {
            if ($category['parent_id'] === null) {
                $children = $this->getAllChildren($category['id']);
                $category['children'] = $children;
                $parents[] = $category;
            }
        }

        return $parents;
    }

    public function format(): array
    {
        return $this->getAllParents();
    }
}
