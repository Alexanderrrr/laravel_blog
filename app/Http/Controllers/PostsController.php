<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::getPublishedPosts();

        return view('posts.index', ['posts' => $posts]);

    }

    public function show($id)
    {
       $post = Post::with('comments')->find($id); //da ne bude lazy loading

       return view('posts.show', ['post' => $post]);


    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
         $this->validate(
               request(),
          Post::VALIDATION_RULES
           );

         Post::create(request()->all());
         return redirect('/');

    }


    public function destroy($postId)
    {
      $deletePost = Post::findOrFail($postId);
      $deletePost->delete();

      return redirect("/posts");
    }
}
