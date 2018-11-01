@extends('posts.master')

@section('title')
    All posts
@endsection

@section('content')
    <h1>Posts</h1>
    <ul>
      @foreach($posts as $post)
      <h6>Created by <a href="/users/{{$post->author->id}}">{{$post->author->name}}</a></h6>

          <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
<hr>
          </div><!-- /.blog-post -->

      @endforeach
      <nav class="blog-pagination">
        <a class="btn btn-outline-{{ $posts->currentPage() == 1 ? 'secondary disabled': 'primary' }}" href="{{ $posts->previousPageUrl() }}">Older</a>
        <a class="btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'secondary disabled' }}" href="{{ $posts->nextPageUrl() }}">Newer</a>
      Page  {{  $posts->currentPage() }} of {{ $posts->lastPage() }}
      </nav>
    </ul>

@endsection
