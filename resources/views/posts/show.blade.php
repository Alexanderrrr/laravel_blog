@extends('posts.master')

@section('title')
  Single Post
@endsection

@section('content')
    <div class="blog-post">
      <h2 class="blog-post-title">{{ $post->title }}</h2>
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
