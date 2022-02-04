@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post (Name : {{ auth()->user()->name }})</h1>
    </div>

        <div class="row my-3">
            <div class="col-lg-8">
                <h3>
                    <h1 class="mb-3">{{ $post->title }}</h1>
                </h3>
                <div class="mb-3"><h15 class="card-text"><small class="text-muted">cobaaplikasi-laravel.test | {{ $post->created_at }}</small></h15></div>
                @if($post->image)
                    <div style="max-height: 400px; overflow: hidden ;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400? {{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                @endif
                <article class="my-3 fs-5 col-lg-auto">
                    {!! $post->body !!}
                    <br>

                    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <span data-feather="x-circle"></span> Delete
                        </button>
                    </form>
                </article>
            </div>
        </div>




@endsection
