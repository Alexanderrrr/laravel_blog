@extends('posts.master')

@section('title')
    Register User
@endsection

@section('content')
<h2>Register User</h2>
<form method="POST" action="/register">

  {{ csrf_field() }}

  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter name">
    @include('posts.partials.error_message', ['field' => 'name']) <!-- gadjamo name od inputa -->
  </div>
  <div class="form-group">
    <label>Email</label>
    <input name="email" type="text" class="form-control" placeholder="Enter email">
    @include('posts.partials.error_message', ['field' => 'email']) <!-- gadjamo name od inputa -->
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Enter password">
    @include('posts.partials.error_message', ['field' => 'password']) <!-- gadjamo name od inputa -->
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
