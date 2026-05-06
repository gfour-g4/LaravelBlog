<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class ReactionController extends Controller
{
    public function likePost(Post $post)
    {
        $post->increment('likes');
        return back();
    }

    public function dislikePost(Post $post)
    {
        $post->increment('dislikes');
        return back();
    }

    public function likeComment(Comment $comment)
    {
        $comment->increment('likes');
        return back();
    }

    public function dislikeComment(Comment $comment)
    {
        $comment->increment('dislikes');
        return back();
    }
}
