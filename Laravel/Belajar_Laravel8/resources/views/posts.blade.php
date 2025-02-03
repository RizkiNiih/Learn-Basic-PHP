

@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-secondary" type="submit" >Search</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
    <img src="https://placehold.co/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center mb-5">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
      <p>
        <small class="text-body-secondary">
        By. <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none px-1">{{ $posts[0]->category->name }}</a>{{ $posts[0]->created_at->diffForHumans() }}
        </small>
    </p>

      <p class="card-text">{{ $posts[0]->excerpt }}</p>

      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
     
    </div>


<div class="card mb-3">

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">

                <div class="card">
                    <div class="position-absolute bg-dark px-2 py-1 text-white"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>

                    <img src="https://placehold.co/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->author->name }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p>
                        <small class="text-body-secondary">
                        By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    

    @else
    <p class="text-center fs-4">No posts found.</p>
    @endif

@endsection

