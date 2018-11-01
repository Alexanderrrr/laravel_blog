@extends('posts.master')

@section('title')
  Single Post
@endsection

@section('content')
<h6>Created by {{$post->author->name}}</h6>

    <div class="blog-post">
      <h2 class="blog-post-title">{{ $post->title }}</h2>

      <p>
          <ul>
              @foreach($post->tags as $tag)
                  <li>
                      <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                  </li>
              @endforeach
          </ul>
      </p>

      <p>{{ $post->body }}</p>
      <form action="/posts/{{ $post->id }}/delete/{{ $post->id }}" method="POST">

        {{ csrf_field() }}

        <button class="btn btn-danger" type="submit" name="button">Delete post</button>
      </form>
      <hr/>

        @if(count($post->comments))
          <h4>Comments</h4>
          <ul class="list-unstyled">
            @foreach($post->comments as $comment)

              <li>
                <p><b>Author:</b> {{ $comment->author }}</p>
                <p>{{ $comment->text }}</p>
                <form action="/posts/{{ $post->id }}/comments/{{ $comment->id }}" method="POST">

                  {{ csrf_field() }}

                  <button class="btn btn-danger" type="submit" name="button">delete comment</button>
                </form>

              </li>

            @endforeach
          </ul>

        @endif
        <h4>Post a Comment</h4>
        <form method="POST" action="/posts/{{ $post->id }}/comments">

          {{ csrf_field() }}

          <div class="form-group">
            <label>Author</label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author">
            @include('posts.partials.error_message', ['field' => 'author']) <!-- gadjamo name od inputa -->
          </div>
          <div class="form-group">
            <label>Text</label>
            <textarea name="text"class="form-control" placeholder="Enter comment" rows="10" cols="80"></textarea>
            @include('posts.partials.error_message', ['field' => 'text'])
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div><!-- /.blog-post -->

@endsection
