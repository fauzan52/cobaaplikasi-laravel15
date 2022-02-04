@extends('layouts.main')
@section('container')
<h1 class="mb-5">List Authors : </h1>
@foreach ($authors as $author)
<h2><a href="/authors/{{ $author->name }}">{{ $author->name }}</a></h2>
@endforeach
@endsection

