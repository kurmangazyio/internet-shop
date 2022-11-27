<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'meta',
        'details',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function hasCategory(string $title): bool
    {
        return Category::where('title', $title)->exists();
    }

    public static function getCategory(string $title): Category | null
    {
        return Category::where('title', $title)->first();
    }

    public static function hasCategoryById(int $id): bool
    {
        return Category::where('id', $id)->exists();
    }

    public static function getAllCategories(): array
    {
        return Category::all()->toArray();
    }

    public static function createCategory(string $title, int|null $categoryId, string $description, string $meta, string $details): Category
    {
        return Category::create([
            'title' => $title,
            'parent_id' => $categoryId,
            'description' => $description,
            'meta' => $meta,
            'details' => $details,
        ]);
    }
}
