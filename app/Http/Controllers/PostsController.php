<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::getPublishedPosts()->latest()->paginate(5);

        return view('posts.index', ['posts' => $posts]);

    }

    public function show($id)
    {
       $post = Post::with('comments')->find($id); //da ne bude lazy loading

       return view('posts.show', ['post' => $post]);


    }

    public function create()
    {
      $tags = Tag::all();
      return view('posts.create')->with('tags', $tags);
    }

    public function store()
    {
         $this->validate(
               request(),
          Post::VALIDATION_RULES
           );

         $post = new Post;
         $post->title = request('title');
         $post->body = request('body');
         $post->author_id = auth()->user()->id;
         $post->published = true;

         $post->save();

         $post->tags()->attach(request('tags'));
         return redirect('/');

    }


    public function destroy($postId)
    {
      $deletePost = Post::findOrFail($postId);
      $deletePost->delete();

      return redirect("/posts");
    }
}
