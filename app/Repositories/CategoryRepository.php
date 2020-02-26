<?php

namespace App\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Models\Album;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Song;
use Illuminate\Support\Facades\Config;

class CategoryRepository
{
    public function getAll()
    {
        $categories = Category::all();
        return $categories;
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category([
            'name' => $request->Category['title']
        ]);
        try {
            $category->save();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function delete(Category $category)
    {
        try {
            $category->delete();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->Category['title'];
        try {
            $category->save();
            return true;
        } catch (\Throwable $th) {
        }
        return false;
    }
}
