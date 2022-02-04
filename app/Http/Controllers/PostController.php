<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
            //                ->orWhere ('body', 'like', '%' . request('search') . '%'); // Untuk mencari isi postingan
        }
        return view('posts', [
            "title" => "All Posts",
            "active" => 'posts',
            "posts" => $posts->paginate(7)->WithQueryString()
            //            "posts" => $posts->get()
            //            "posts" => Post::with (['author', 'category'])->latest()->get()
        ]);
    }


    public function show(Post $post)
    {
        // dd($post->category()->toArray());
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
