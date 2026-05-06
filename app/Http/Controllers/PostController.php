<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'newest');
        
        $posts = Post::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->when($sort === 'newest', fn($q) => $q->orderBy('id', 'desc'))
            ->when($sort === 'oldest', fn($q) => $q->orderBy('id', 'asc'))
            ->when($sort === 'title-asc', fn($q) => $q->orderBy('title', 'asc'))
            ->when($sort === 'title-desc', fn($q) => $q->orderBy('title', 'desc'))
            ->when($sort === 'likes', fn($q) => $q->orderBy('likes', 'desc'))
            ->when($sort === 'dislikes', fn($q) => $q->orderBy('dislikes', 'desc'))
            ->get();
        
        return view('posts.index', compact('posts', 'search', 'sort'));
    }

    public function show(Post $post)
    {
        $post->load('comments.user', 'user');
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAuthor()) {
            abort(403);
        }
        return view('posts.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAuthor()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $user = Auth::user();
        if (!$user || (!$user->isAdmin() && $post->user_id != $user->id)) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        if (!$user || (!$user->isAdmin() && $post->user_id != $user->id)) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();
        if (!$user || (!$user->isAdmin() && $post->user_id != $user->id)) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
