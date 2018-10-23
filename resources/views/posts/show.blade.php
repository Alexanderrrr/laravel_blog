@extends('posts.master')

@section('title')
  Single Post
@endsection

@section('content')
    <div class="blog-post">
      <h2 class="blog-post-title"><a href="/posts">{{ $post->title }}</a></h2>
      <p>{{ $post->body }}</p>

    </div><!-- /.blog-post -->

@endsection
