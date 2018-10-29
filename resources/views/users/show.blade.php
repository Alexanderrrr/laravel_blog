@extends('posts.master')

@section('title')
    All posts
@endsection

@section('content')
    <h1>Posts</h1>
    <ul>
      @foreach($author->posts as $post)
      <h6>Created by {{$post->author->name}}</h6>

          <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
<hr>
          </div><!-- /.blog-post -->

      @endforeach
    </ul>

@endsection
