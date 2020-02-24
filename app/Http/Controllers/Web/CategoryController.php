<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $songs = $category->songs;
        return view('web.category', [
            'songs' => $songs,
            'category' => $category
        ]);
    }
}
