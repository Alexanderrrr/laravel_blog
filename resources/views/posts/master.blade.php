<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>@yield('title')</title>

  </head>
  <body>

<main role="main" class="container">
  @if($flash = session('message'))
      <div class="alert alert-success">
          {{ $flash }}
      </div>
  @endif

  @include('posts.partials.header')

      <div class="row">
        <div class="col-md-8 blog-main">

             @yield('content')


        </div><!-- /.blog-main -->
           <aside class="col-md-4 blog-sidebar">

                @include('posts.partials.sidebar')

           </aside><!-- /.blog-sidebar -->


      </div><!-- /.row -->
      @include('posts.partials.footer')

    </main><!-- /.container -->


      </body>
    </html>
