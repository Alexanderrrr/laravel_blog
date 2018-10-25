<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);

        $this->validate(
              request(),
              Comment::VALIDATION_RULES
          );

        $post->comments()->create(
            request()->all());
            return redirect("/posts/{$postId}");

    }

    public function destroy($postId, $commentId)
    {

        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect("/posts/{$postId}");

    }

}
