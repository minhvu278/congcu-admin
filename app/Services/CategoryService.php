<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }
}
