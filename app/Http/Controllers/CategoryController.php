<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories', [
            "title" => 'Post Categories',
            "active" => 'categories',
            "categories" => $categories
        ]);
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category['id'])->paginate(7);
        return view('posts', [
            'title' => "Post By Category : $category->name",
            'active' => 'categories',
            'posts' => $posts,
        ]);
    }
}
