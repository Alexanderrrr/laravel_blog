@extends('posts.master')

@section('title')
    All posts
@endsection

@section('content')
    <h1>Posts</h1>
    <ul>
      @foreach($posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>

          </div><!-- /.blog-post -->

      @endforeach
    </ul>

@endsection
