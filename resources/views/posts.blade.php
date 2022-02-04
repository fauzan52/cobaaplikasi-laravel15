@extends('layouts.main')
@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>
<div class="row">
    <div class="col-md-6"></div>
    <form action="/posts">
{{--        // PENCARIAN FIELD MELALUI CATEGORY (TIDAK JALAN)--}}
{{--        @if(request('category'))--}}
{{--            <input type="hidden" name="category" value="{{ request('category') }}">--}}
{{--        @endif--}}
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search For Title All Posts" name="search">
            <button class="btn btn-danger" type="submit">Search</button>
        </div>
    </form>
</div>
<style type="text/css">
    h11{
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
@if($posts->count())
    <div class="card mb-3">
        @if($posts[0]->image)
            <div style="max-height: 400px; overflow: hidden ;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
        @else
            <img src="https://source.unsplash.com/1200x400? {{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <style type="text/css">
            h11{
                background-color: rgba(0, 0, 0, 0.5);
            }
        </style>
       <h11> <div class="position-absolute bg-black px-3 py-2 text-white" style="background-color:rgba(0, 0, 0, 0.5)"><a href="/categories/{{ $posts[0]->category->slug }}" class="text-white text-decoration-none">{{ $posts[0]->category->name }}</a></div></h11>

        <div class="card-body text-center">
            <h3>
                <a href="{{ route('posts.show',['post' => $posts[0]->slug]) }}" class="text-decoration-none">{{ $posts[0]->title }}</a>
            </h3>
            <h15 class="card-text"><small class="text-muted">• {{ $posts[0]->created_at->diffForHumans() }}</small></h15>
            <br>
            <h10>
                By : <a href="/authors/{{ $posts[0]->author }}" class="text-decoration-none" > {{ $posts[0]->author }} </a>
            </h10>
            <br>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>

            <a href="{{ route('posts.show',['post' => $posts[0]->slug]) }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
    </div>

<div class="container">
    <div class="row">
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <h11><div class="position-absolute bg-black px-3 py-2 text-white" style="background-color:white"><a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div></h11>
                @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                @else
                    <img src="https://source.unsplash.com/500x400? {{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <div class="card-body">
                    <h3>
                        <a href="{{ route('posts.show',['post' => $post->slug]) }}" class="text-decoration-none">{{ $post->title }}</a>
                    </h3>
                    <h15 class="card-text"><small class="text-muted">• {{ $posts[0]->created_at->diffForHumans() }}</small></h15>
                    <br>
                    <h10>
                        By : <a href="/authors/{{ $post->user->username }}" class="text-decoration-none" > {{ $post->user->name }} </a>
                    </h10>
                    <br>
                    <p class="card-text">{{ $post->excerpt }}</p>

                    <a href="{{ route('posts.show',['post' => $post->slug]) }}"  class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
    <p class="text-center fs-4">Post not found</p>
@endif
<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>

@endsection

