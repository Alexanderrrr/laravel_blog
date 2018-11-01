@extends('posts.master')

@section('title')

  Create post

@endsection

@section('content')
<form method="POST" action="/posts">

  {{ csrf_field() }}

  <div class="form-group">
    <label>Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter title">
    @include('posts.partials.error_message', ['field' => 'title']) <!-- gadjamo name od inputa -->
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body"class="form-control" placeholder="Enter body" rows="10" cols="80"></textarea>
    @include('posts.partials.error_message', ['field' => 'body'])
  </div>
  <div class="form-group form-check">
    <input checked="true" value="1" name="published" type="checkbox" class="form-check-input">
    <label class="form-check-label">Publish this post?</label>
  </div>

  <div class="form-group">
      <label>Select tags</label><br/>

      @foreach($tags as $tag)
      {{ $tag->name }} <input type="checkbox" name="tags[]" value="{{  $tag->id  }}"><br/>
      @endforeach
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection
