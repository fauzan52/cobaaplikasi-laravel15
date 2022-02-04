<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;

class AuthorController extends Controller
{
    public function index()
    {
        $author = Author::get();
        return view('authors', [
            "title" => 'Post Author',
            "active" => 'author',
            "authors" => $author
        ]);
    }

    public function show()
    {
        $author =;
        $posts  = Post::where('author', $author)->paginate(7);
        return view('author', [
            'title' => "Post By Author : $posts->author",
            'active' => 'authors',
            'posts' => $posts,
        ]);
    }
}
