@extends('posts.master')

@section('title')
  Single Post
@endsection

@section('content')
    <div class="blog-post">
      <h2 class="blog-post-title"><a href="/posts">{{ $post->title }}</a></h2>
      <p>{{ $post->body }}</p>

        @if(count($post->comments))
          <h4>Comments</h4>
          <ul class="list-unstyled">
            @foreach($post->comments as $comment)

              <li><p><b>Author:</b> {{ $comment->author }}</p></li>
              <p>{{ $comment->text }}</p>

            @endforeach
          </ul>

        @endif

    </div><!-- /.blog-post -->

@endsection
